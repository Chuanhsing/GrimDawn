GrimDawn localization file
========

官方翻譯論壇

* http://www.grimdawn.com/forums/forumdisplay.php?f=33

上傳語系檔，上傳後在遊戲內的語系下拉選單會可以直接下載
Sticky: In-Game Localization Downloads

* http://www.grimdawn.com/forums/showthread.php?t=35475

遊戲內目前可下載的版本

* Chinese: 版本 v1.0.0.5，簡體中文，第一批翻譯的人做的
  * http://www.grimdawn.com/forums/showthread.php?t=23250
* Chinese_m: 版本 v1.0.0.5，簡體中文，翻譯詞句有貼吧重新潤飾
  * 註：上述兩個都不是 v1.0.0.5 Hotfix 2 最新版

論壇可下載的版本

* tt300：版本 v1.0.0.5 Hotfix 2，簡體中文
  * http://www.grimdawn.com/forums/showpost.php?p=427411&postcount=120
* chiousf：版本 v1.0.0.5 Hotfix 2，繁體中文，為 tt300 簡轉繁並修飾版
  * http://forum.gamer.com.tw/C.php?bsn=19441&snA=32&tnum=56
* 貼吧：版本 v1.0.0.5，簡體中文
  * http://tieba.baidu.com/p/4095260985?see_lz=1&pn=2

翻譯資料產生
========

官方翻譯資料版本 Community Localizations (v1.0.0.5)

* http://www.grimdawn.com/forums/showthread.php?t=45172
* 註: Steam 最新版為 v1.0.0.5 Hotfix 2

自己解檔案，只有 text_en 解出來的檔案可以直接用，裡面包含的是 tags_* 的檔案，其他解出來的仍然是二進位檔案，如 conversations.arc 解出的 npc_*，轉成翻譯檔案的方式已知。但是因為我沒買 DLC，所以無法更新 object_defensesite_*.txt 的檔案。

	ArchiveTool.exe resources\text_en.arc -extract D:\GrimDawn\resources
	ArchiveTool.exe resources\Conversations.arc -extract D:\GrimDawn\resources
	ArchiveTool.exe resources\Quests.arc -extract D:\GrimDawn\resources

* text_en.arc -> tags_*
* Conversations.arc -> npc_*, object_*
* Quests.arc -> bq_*, mq_*, sq_*


翻譯
========

* tags_* 的格式為 tagXXXX=YYYY，只要翻譯 YYYY
* tags_* 以外的格式為每行對應，空白行不可刪除，行數對應的就是翻譯資料
* 換行必須要 {n} 不可直接換行
* 檔案格式為 UTF8 no-BOM，編輯器不要用微軟的記事本，可以用 Notepad++ 或 Atom

Q & A
========

文字沒有斷行

* 檢查 zip 包裡面的 language.def 的 wordmode=false 是否有正常設定，如果沒有該設定就直接增加一行。

文字變成方塊

* 檢查每個檔案是否有儲存為 UTF8 no-BOM 格式，如果儲存成 ASCII 格式會因為編碼錯誤變成方塊。

翻譯版本錯誤可能的問題

* 會造成對話可能沒有內容，或是出現 Tag Not Found 的錯誤。

Tag Not Found 問題

* text_en.arc 新增的 Tag 未翻譯，可以用官方內建的工具 ArchiveTool.exe 解開 text_en.arc 後，用整併工具合併新增的部分，然後重新打包就可以了。

備份
========

https://github.com/Chuanhsing/GrimDawn/releases

