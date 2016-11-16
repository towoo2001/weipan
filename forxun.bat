@echo off
for /f "delims=" %%i in (web.txt) do (
start /min "" "%programfiles%\Internet Explorer\iexplore.exe" "%%i"
for /l %%j in (10,-1,1) do (
cls
echo        倒计时  %%j  秒后打开下一个网页...
ping 127.1 -n 2 >nul
))
taskkill /f /t /im iexplore.exe