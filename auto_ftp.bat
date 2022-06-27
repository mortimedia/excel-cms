@echo off

"C:\Program Files (x86)\WinSCP\WinSCP.com" ^
  /log="D:\0files\winscp.log" /ini=nul ^
  /command ^
    "open ftpes://excel@yoursite.com:password@ftp.yoursite.com/ -certificate=""*""" ^
    "lcd %1" ^
    "put %2" ^
    "exit"
