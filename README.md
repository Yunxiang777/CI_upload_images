# CI_upload_images
<h2>使用Codeigniter，搭配mysql，上傳圖片功能，並儲存於本地資料夾</h2>
<h3>資料庫</h3>
<ul>
  <li>mysql</li>
  <li>Database : codeigniter</li>
  <li>tablename : tbl_images</li>
</ul>
<h3>圖片資料夾說明</h3>
<p>使用Apache的，在專案檔案 '.htaccess' 需使用以下代碼</p>
<pre>RewriteEngine On
RewriteCond $1 !^(index\.php|images|robots\.txt)
RewriteRule ^(.*)$ /ci/index.php/$1 [L]</pre>
<p>伺服器重寫規格，以確保資料夾images，URL符合專案的路徑</p>
<h3>使用</h3>
<ul>
  <li>多張圖 : http://localhost/ci/Images_upload/image_upload</li>
  <li>單張圖 : http://localhost/ci/main/image_upload</li>
</ul>
<h3>技術</h3>
<ul>
  <li>PHP資料庫連線Mysql</li>
  <li>Jquery，使用Ajax</li>
</ul>
