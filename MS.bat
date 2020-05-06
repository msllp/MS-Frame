@echo off
set welcomeMsg=Welcome to MS CLI Tool Developed by Million Solutions LLP
set command1=1.MS start Test : To start test server on port 9080 and 9081 for Database Portal
set comman1Raw=start
echo %welcomeMsg%
if "%1"=="start" (
if "%2"=="Test" (
    MSServerStart
   )
)
if "%1"=="update" (

if "%2"=="core" (CMUpdate)
if "%2"=="webpack" (npm run dev)

)
if "%1"=="help" (
set errorMsg= you fool,go and help your self.Fuck off buddy.
echo %errorMsg%
)


if "%1"=="pub" (
if "%2"=="js" (
    MSVendor js
   )
)
