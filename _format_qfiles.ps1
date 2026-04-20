$ErrorActionPreference='Stop'
$root='d:\CODING\bvimr-php'
$qFile=Join-Path $root 'Lab File\questions.md'
$questionMap=@{}
Get-Content $qFile | ForEach-Object {
  if ($_ -match '^\s*(\d+)\.\s*(.+?)\s*$') {
    $questionMap[[int]$matches[1]] = $matches[2].Trim()
  }
}

function Format-PHPCode([string]$code) {
  $code = $code -replace '\r\n?', "`n"
  $sb = New-Object System.Text.StringBuilder
  $indent = 0
  $parenDepth = 0
  $inSingle = $false
  $inDouble = $false
  $escaped = $false

  for ($i = 0; $i -lt $code.Length; $i++) {
    $ch = $code[$i]

    if ($inSingle) {
      [void]$sb.Append($ch)
      if (-not $escaped -and $ch -eq "'") { $inSingle = $false }
      $escaped = (-not $escaped -and $ch -eq '\\')
      continue
    }

    if ($inDouble) {
      [void]$sb.Append($ch)
      if (-not $escaped -and $ch -eq '"') { $inDouble = $false }
      $escaped = (-not $escaped -and $ch -eq '\\')
      continue
    }

    if ($ch -eq "'") { $inSingle = $true; [void]$sb.Append($ch); $escaped = $false; continue }
    if ($ch -eq '"') { $inDouble = $true; [void]$sb.Append($ch); $escaped = $false; continue }

    switch ($ch) {
      '(' { $parenDepth++; [void]$sb.Append($ch); continue }
      ')' { if ($parenDepth -gt 0) { $parenDepth-- }; [void]$sb.Append($ch); continue }
      '{' {
        [void]$sb.Append($ch)
        [void]$sb.Append("`n")
        $indent++
        [void]$sb.Append(('    ' * $indent))
        continue
      }
      '}' {
        if ($indent -gt 0) { $indent-- }
        [void]$sb.Append("`n")
        [void]$sb.Append(('    ' * $indent))
        [void]$sb.Append('}')
        continue
      }
      ';' {
        [void]$sb.Append(';')
        if ($parenDepth -eq 0) {
          [void]$sb.Append("`n")
          [void]$sb.Append(('    ' * $indent))
        }
        continue
      }
      default {
        [void]$sb.Append($ch)
      }
    }
  }

  $out = $sb.ToString()
  $out = $out -replace '[ \t]+\n', "`n"
  $out = $out -replace '\n{3,}', "`n`n"
  return $out.Trim()
}

$files = Get-ChildItem -Path $root -Filter 'q*.php' -File | Sort-Object { [int]($_.BaseName -replace '\D', '') }
foreach ($file in $files) {
  if ($file.BaseName -notmatch '^q(\d+)$') { continue }
  $num = [int]$matches[1]
  $question = if ($questionMap.ContainsKey($num)) { $questionMap[$num] } else { "Question $num" }

  $raw = Get-Content $file.FullName -Raw
  $raw = $raw -replace '\r\n?', "`n"
  $body = $raw -replace '^\s*<\?php\s*', ''
  $body = $body -replace '\s*\?>\s*$', ''

  $formattedBody = Format-PHPCode $body
  $formattedBody = $formattedBody -replace ';\s*(echo\s+"Program written and executed by Ujjwal Gupta of BCA 6 Morning, ERP: 0231BCA051"\s*;)', ";`n$1"

  $newContent = @(
    "<?php"
    "// Q${num}: $question"
    $formattedBody
    "?>"
  ) -join "`n"

  Set-Content -Path $file.FullName -Value $newContent
}
Write-Output 'Done'
