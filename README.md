GrimDawn localization file
========

官方論壇

	http://www.grimdawn.com/forums/forumdisplay.php?f=33

上傳語系檔，上傳後在遊戲內的語系下拉選單會可以直接下載
Sticky: In-Game Localization Downloads

	http://www.grimdawn.com/forums/showthread.php?t=35475

最後一版的翻譯版本
Community Localizations (v1.0.0.5)

	註: Steam 最新版為 v1.0.0.5 Hotfix 2

遊戲內目前可下載的版本

	Chinese: 版本 v1.0.0.5，簡體中文，第一批翻譯的人做的
	http://www.grimdawn.com/forums/showthread.php?t=23250
	Chinese_m: 版本 v1.0.0.5，簡體中文，翻譯詞句有貼吧重新潤飾
	註：上述兩個都不是 v1.0.0.5 Hotfix 2 最新版

論壇可下載的版本

	tt300：版本 v1.0.0.5 Hotfix 2，簡體中文
	http://www.grimdawn.com/forums/showpost.php?p=427411&postcount=120
	chiousf：版本 v1.0.0.5 Hotfix 2，繁體中文，為 tt300 簡轉繁並修飾版
	http://forum.gamer.com.tw/C.php?bsn=19441&snA=32&tnum=56

翻譯資料產生
========

官方翻譯資料版本
Community Localizations (v1.0.0.5)

	http://www.grimdawn.com/forums/showthread.php?t=45172
	註: Steam 最新版為 v1.0.0.5 Hotfix 2

自己解檔案，只有 text_en 解出來的檔案可以直接用，裡面包含的是 tags_* 的檔案
ArchiveTool.exe resources\text_en.arc -extract D:\GrimDawn\resources

	text_en.arc -> tags_*
	Conversations.arc -> npc_*

其他解出來的仍然是二進位檔案，如 conversations.arc 解出的 npc_*

翻譯
========

* tags_* 的格式為 tagXXXX=YYYY，只要翻譯 YYYY
* tags_* 以外的格式為每行對應，空白行不可刪除，行數對應的就是翻譯資料
* 換行必須要 {n} 不可直接換行

備份
========

https://github.com/Chuanhsing/GrimDawn/releases
