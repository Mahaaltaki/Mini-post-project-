أوال يتم انشاء قاعدة البيانات: 
 قم بفتح تطبيق قاعدة البيانات الخاص بك )مثل phpMyAdmin( أو استخدم سطر األوامر إلنشاء قاعدة بيانات جديدة 
 .blog_db تسمى
 ثم إنشاء جدول جديد باسم posts باستخدام التعليمات التالية:
sql
 ( CREATE TABLE posts
 ,id INT AUTO_INCREMENT PRIMARY KEY 
,title VARCHAR(255) NOT NULL 
,content TEXT NOT NULL 
,author VARCHAR(255) NOT NULL 
,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE 
CURRENT_TIMESTAMP
;)
2. إلعداد بيئة العمل: 
 تأكد من تثبيت XAMPP أو WAMP إذا كنت تعمل على Windows، أو أي بيئة أخرى تحتوي على PHP و 
 .MySQL
 تأكد من أن خدمة Apache و MySQL تعمل في XAMPP/WAMP.
3. لتهيئة الملفات والمجلدات : 
 ضع الملفات التي كتبتها داخل مجلد المشروع في htdocs )إذا كنت تستخدم XAMPP( أو في www )إذا كنت 
تستخدم WAMP(.
 هيكل المجلد يجب أن يكون كالتالي : 
/project-folder 
create_post.php ──├ 
delete_post.php ──├
edit_post.php ──├ 
index.php ──├ 
list_post.php ──├ 
one_post.php ──├ 
store.php ──├ 
update_post.php ──├ 
Database.php ──├ 
posts.php ──└ 
4.لحتى يتم تشغيل المشروع: 
 افتح متصفح الويب الخاص بك وانتقل إلى http://localhost/project-folder/index.php. 
 ستظهر لك صفحة تحتوي على قائمة بجميع المنشورات، مع خيارات إلضافة، تعديل ، أو حذف المنشورات وأيضا 
بحث عن بوست من خالل عنوانه.
5. شرح الملفات الرئيسية:
 Database.php: يحتوي على كود االتصال بقاعدة البيانات، وتنفيذ االستعالمات. 
 posts.php: يحتوي على الكود الخاص بالتعامل مع المنشورات )CRUD: إنشاء، قراءة، تحديث، حذف(. 
 store.php: يعالج البيانات التي تم إدخالها عند إضافة منشور جديد.
 .الموجودة المنشورات لتعديل :update_post.php و edit_post.php 
 delete_post.php: لحذف منشور محدد. 
 list_post.php: لعرض جميع المنشورات. 
 one_post.php: لعرض منشور محدد بنا ء على البحث . 
6. اختبار المشروع: 
 قم بإضافة منشورات جديدة باستخدام صفحة اإلضافة )create_post.php(.
 جرب تعديل وحذف المنشورات باستخدام الصفحات المخصصة لذلك . 
 استخدم وظيفة البحث لعرض منشور معين. 
 
