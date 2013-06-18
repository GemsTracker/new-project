@echo off

setlocal

rem Switch to script directory.
%~d0
cd %~dp0

php.exe -f %~dp0index.php -- %*

endlocal