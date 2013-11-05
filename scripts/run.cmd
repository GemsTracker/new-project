@echo off
php.exe -d memory_limit=2048M -f %~dp0index.php -- %*
