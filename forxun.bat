@echo off
for /f "delims=" %%i in (web.txt) do (
start /min "" "%programfiles%\Internet Explorer\iexplore.exe" "%%i"
for /l %%j in (10,-1,1) do (
cls
echo        ����ʱ  %%j  ������һ����ҳ...
ping 127.1 -n 2 >nul
))
taskkill /f /t /im iexplore.exe