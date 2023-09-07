<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguageLinesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('language_lines')->delete();
        
        \DB::table('language_lines')->insert(array (
            0 => 
            array (
                'id' => 10,
                'group' => 'dashboard',
                'key' => 'title',
                'text' => '{"en":"Dashboard","tr":"G\\u00f6sterge"}',
                'created_at' => '2022-06-13 14:35:21',
                'updated_at' => '2022-06-13 17:33:41',
            ),
            1 => 
            array (
                'id' => 11,
                'group' => 'translations',
                'key' => 'title',
                'text' => '{"en":"Translations","ch":null,"tr":"\\u00c7eivirler"}',
                'created_at' => '2022-06-13 14:35:21',
                'updated_at' => '2022-07-04 11:55:29',
            ),
            2 => 
            array (
                'id' => 12,
                'group' => 'translations',
                'key' => 'group',
                'text' => '{"en":"Group","ch":null,"tr":null}',
                'created_at' => '2022-06-13 17:23:33',
                'updated_at' => '2022-06-13 17:23:33',
            ),
            3 => 
            array (
                'id' => 13,
                'group' => 'translations',
                'key' => 'key',
                'text' => '{"en":"Key","ch":null,"tr":null}',
                'created_at' => '2022-06-13 17:24:10',
                'updated_at' => '2022-06-13 17:24:10',
            ),
            4 => 
            array (
                'id' => 14,
                'group' => 'modal',
                'key' => 'close',
                'text' => '{"en":"Close","ch":null,"tr":null}',
                'created_at' => '2022-06-13 17:27:06',
                'updated_at' => '2022-06-13 17:27:06',
            ),
            5 => 
            array (
                'id' => 15,
                'group' => 'modal',
                'key' => 'save',
                'text' => '{"en":"Save","ch":null,"tr":null}',
                'created_at' => '2022-06-13 17:27:25',
                'updated_at' => '2022-06-13 17:27:25',
            ),
            6 => 
            array (
                'id' => 16,
                'group' => 'translations',
                'key' => 'add_row',
                'text' => '{"en":"Add","ch":null,"tr":"Ekle"}',
                'created_at' => '2022-06-13 17:28:02',
                'updated_at' => '2022-06-19 19:39:29',
            ),
            7 => 
            array (
                'id' => 17,
                'group' => 'system',
                'key' => 'clear_cache',
                'text' => '{"en":"Clear Cache","ch":null,"tr":"\\u00d6nbelle\\u011fi Temizle"}',
                'created_at' => '2022-06-13 17:28:20',
                'updated_at' => '2022-06-19 19:39:46',
            ),
            8 => 
            array (
                'id' => 18,
                'group' => 'translations',
                'key' => 'create.title',
                'text' => '{"en":"Add New Line","ch":null,"tr":"Sat\\u0131r Ekle"}',
                'created_at' => '2022-06-13 18:30:30',
                'updated_at' => '2022-06-19 19:39:34',
            ),
            9 => 
            array (
                'id' => 19,
                'group' => 'settings',
                'key' => 'title',
                'text' => '{"en":"Settings","ch":null,"tr":"Ayarlar"}',
                'created_at' => '2022-06-16 17:04:07',
                'updated_at' => '2022-07-04 11:56:29',
            ),
            10 => 
            array (
                'id' => 20,
                'group' => 'settings',
                'key' => 'group_general',
                'text' => '{"en":"General","ch":null,"tr":"Genel"}',
                'created_at' => '2022-06-16 20:35:07',
                'updated_at' => '2022-06-16 20:35:07',
            ),
            11 => 
            array (
                'id' => 21,
                'group' => 'settings',
                'key' => 'group_mail',
                'text' => '{"en":"Mail","ch":null,"tr":"E-posta"}',
                'created_at' => '2022-06-16 20:35:29',
                'updated_at' => '2022-06-16 20:35:29',
            ),
            12 => 
            array (
                'id' => 22,
                'group' => 'main',
                'key' => 'id',
                'text' => '{"en":"ID","ch":"ID","tr":"ID"}',
                'created_at' => '2022-06-19 18:56:07',
                'updated_at' => '2022-06-19 18:56:07',
            ),
            13 => 
            array (
                'id' => 23,
                'group' => 'users',
                'key' => 'title',
                'text' => '{"en":"Users","ch":null,"tr":"Kullan\\u0131c\\u0131lar"}',
                'created_at' => '2022-06-19 18:57:05',
                'updated_at' => '2022-08-29 10:49:49',
            ),
            14 => 
            array (
                'id' => 24,
                'group' => 'blog',
                'key' => 'title',
                'text' => '{"en":"Blog","ch":null,"tr":"Blog"}',
                'created_at' => '2022-06-19 18:57:15',
                'updated_at' => '2022-06-19 18:57:15',
            ),
            15 => 
            array (
                'id' => 25,
                'group' => 'action',
                'key' => 'save',
                'text' => '{"en":"Save","ch":null,"tr":"Kaydet"}',
                'created_at' => '2022-06-19 19:38:08',
                'updated_at' => '2022-06-19 19:38:08',
            ),
            16 => 
            array (
                'id' => 26,
                'group' => 'action',
                'key' => 'add',
                'text' => '{"en":"Add","ch":null,"tr":"Ekle"}',
                'created_at' => '2022-06-19 19:40:24',
                'updated_at' => '2022-06-19 19:40:24',
            ),
            17 => 
            array (
                'id' => 27,
                'group' => 'meta',
                'key' => 'content',
                'text' => '{"en":"SEO Meta options","ch":null,"tr":"SEO Meta Opsiyonlar\\u0131"}',
                'created_at' => '2022-06-20 18:09:57',
                'updated_at' => '2022-06-20 18:09:57',
            ),
            18 => 
            array (
                'id' => 28,
                'group' => 'meta',
                'key' => 'title',
                'text' => '{"en":"Meta title","ch":null,"tr":"Meta Ba\\u015fl\\u0131k"}',
                'created_at' => '2022-06-20 18:10:17',
                'updated_at' => '2022-06-20 18:10:17',
            ),
            19 => 
            array (
                'id' => 29,
                'group' => 'meta',
                'key' => 'description',
                'text' => '{"en":"Meta description","ch":null,"tr":"Meta A\\u00e7\\u0131klama"}',
                'created_at' => '2022-06-20 18:10:31',
                'updated_at' => '2022-06-20 18:10:31',
            ),
            20 => 
            array (
                'id' => 30,
                'group' => 'blog',
                'key' => 'content',
                'text' => '{"en":"Post Content","ch":null,"tr":"Payla\\u015f\\u0131m \\u0130\\u00e7eri\\u011fi"}',
                'created_at' => '2022-06-20 18:11:05',
                'updated_at' => '2022-06-20 18:11:05',
            ),
            21 => 
            array (
                'id' => 31,
                'group' => 'blog',
                'key' => 'post.title',
                'text' => '{"en":"Post Title","ch":null,"tr":"Ba\\u015fl\\u0131k"}',
                'created_at' => '2022-06-20 18:11:24',
                'updated_at' => '2022-06-20 18:11:24',
            ),
            22 => 
            array (
                'id' => 32,
                'group' => 'blog',
                'key' => 'post.body',
                'text' => '{"en":"Post Body","ch":null,"tr":"\\u0130\\u00e7erik"}',
                'created_at' => '2022-06-20 18:11:34',
                'updated_at' => '2022-06-20 18:11:34',
            ),
            23 => 
            array (
                'id' => 33,
                'group' => 'blog',
                'key' => 'post.image',
                'text' => '{"en":"Post Cover","ch":null,"tr":"\\u00d6ne \\u00c7\\u0131kan G\\u00f6rsel"}',
                'created_at' => '2022-06-20 18:12:20',
                'updated_at' => '2022-06-20 18:12:20',
            ),
            24 => 
            array (
                'id' => 34,
                'group' => 'blog',
                'key' => 'post.details',
                'text' => '{"en":"Post Details","ch":null,"tr":"Payla\\u015f\\u0131m Ayarlar\\u0131"}',
                'created_at' => '2022-06-20 18:12:53',
                'updated_at' => '2022-06-20 18:12:53',
            ),
            25 => 
            array (
                'id' => 35,
                'group' => 'main',
                'key' => 'status',
                'text' => '{"en":"Status","ch":null,"tr":"Durum"}',
                'created_at' => '2022-06-20 18:13:11',
                'updated_at' => '2022-06-20 18:13:11',
            ),
            26 => 
            array (
                'id' => 36,
                'group' => 'options',
                'key' => 'select',
                'text' => '{"en":"Select","ch":null,"tr":"Se\\u00e7iniz"}',
                'created_at' => '2022-06-20 18:13:27',
                'updated_at' => '2022-06-20 18:13:27',
            ),
            27 => 
            array (
                'id' => 37,
                'group' => 'main',
                'key' => 'category',
                'text' => '{"en":"Category","ch":null,"tr":"Kategori"}',
                'created_at' => '2022-06-20 18:13:45',
                'updated_at' => '2022-06-20 18:13:45',
            ),
            28 => 
            array (
                'id' => 38,
                'group' => 'main',
                'key' => 'tags',
                'text' => '{"en":"Tags","ch":null,"tr":"Etiketler"}',
                'created_at' => '2022-06-20 18:13:55',
                'updated_at' => '2022-06-20 18:14:12',
            ),
            29 => 
            array (
                'id' => 39,
                'group' => 'action',
                'key' => 'delete',
                'text' => '{"en":"Delete","ch":null,"tr":"Sil"}',
                'created_at' => '2022-06-20 18:14:43',
                'updated_at' => '2022-06-20 18:14:43',
            ),
            30 => 
            array (
                'id' => 40,
                'group' => 'action',
                'key' => 'discard',
                'text' => '{"en":"Discard","ch":null,"tr":"De\\u011fi\\u015fiklikleri yok say"}',
                'created_at' => '2022-06-20 18:15:04',
                'updated_at' => '2022-06-20 18:15:04',
            ),
            31 => 
            array (
                'id' => 41,
                'group' => 'blog',
                'key' => 'action_add',
                'text' => '{"en":"Add post","ch":null,"tr":"Yeni yaz\\u0131"}',
                'created_at' => '2022-07-04 11:41:13',
                'updated_at' => '2022-07-04 11:41:13',
            ),
            32 => 
            array (
                'id' => 42,
                'group' => 'menu',
                'key' => 'dashboard.index',
                'text' => '{"en":"Dashboard","ch":null,"tr":"Ana sayfa"}',
                'created_at' => '2022-07-04 16:00:15',
                'updated_at' => '2022-07-04 16:00:15',
            ),
            33 => 
            array (
                'id' => 43,
                'group' => 'menu',
                'key' => 'users.index',
                'text' => '{"en":"Users","ch":null,"tr":"Kullan\\u0131c\\u0131lar"}',
                'created_at' => '2022-07-04 16:00:27',
                'updated_at' => '2022-08-29 10:50:15',
            ),
            34 => 
            array (
                'id' => 44,
                'group' => 'menu',
                'key' => 'blog.index',
                'text' => '{"en":"Blog","ch":null,"tr":"Blog"}',
                'created_at' => '2022-07-04 16:00:38',
                'updated_at' => '2022-07-04 16:00:38',
            ),
            35 => 
            array (
                'id' => 45,
                'group' => 'menu',
                'key' => 'translations.index',
                'text' => '{"en":"Translations","ch":"Perevodi","tr":"Perevodi"}',
                'created_at' => '2022-07-04 16:00:49',
                'updated_at' => '2022-10-24 07:43:51',
            ),
            36 => 
            array (
                'id' => 46,
                'group' => 'menu',
                'key' => 'settings.index',
                'text' => '{"en":"Settings","ch":null,"tr":"Ayarlar"}',
                'created_at' => '2022-07-04 16:00:59',
                'updated_at' => '2022-09-06 21:47:44',
            ),
            37 => 
            array (
                'id' => 47,
                'group' => 'breadcrumbs',
                'key' => 'blog.index',
                'text' => '{"en":"Blog Posts","ch":null,"tr":"Blog Yaz\\u0131lar\\u0131"}',
                'created_at' => '2022-07-04 16:05:03',
                'updated_at' => '2022-07-04 16:05:03',
            ),
            38 => 
            array (
                'id' => 48,
                'group' => 'breadcrumbs',
                'key' => 'blog.create',
                'text' => '{"en":"New Post","ch":null,"tr":"Yeni Blog Yaz\\u0131s\\u0131"}',
                'created_at' => '2022-07-04 16:05:15',
                'updated_at' => '2022-07-04 16:05:15',
            ),
            39 => 
            array (
                'id' => 49,
                'group' => 'breadcrumbs',
                'key' => 'blog.edit',
                'text' => '{"en":"Edit Post","ch":null,"tr":"Blog Yaz\\u0131s\\u0131"}',
                'created_at' => '2022-07-04 16:05:30',
                'updated_at' => '2022-07-04 16:54:02',
            ),
            40 => 
            array (
                'id' => 50,
                'group' => 'breadcrumbs',
                'key' => 'blog.show',
                'text' => '{"en":"Blog Post","ch":null,"tr":"Blog Yaz\\u0131s\\u0131"}',
                'created_at' => '2022-07-04 16:08:08',
                'updated_at' => '2022-07-04 16:57:04',
            ),
            41 => 
            array (
                'id' => 51,
                'group' => 'confirmation',
                'key' => 'blog.post.destroy',
                'text' => '{"en":"Are you sure?","ch":null,"tr":"Blog yaz\\u0131s\\u0131n\\u0131 silmek istiyormusunuz?"}',
                'created_at' => '2022-07-04 17:20:41',
                'updated_at' => '2022-07-04 17:20:41',
            ),
            42 => 
            array (
                'id' => 52,
                'group' => 'message',
                'key' => 'blog.post.deleted',
                'text' => '{"en":"Blog post deleted","ch":null,"tr":"Blog yaz\\u0131s\\u0131 silindi"}',
                'created_at' => '2022-07-04 17:21:50',
                'updated_at' => '2022-07-04 17:21:50',
            ),
            43 => 
            array (
                'id' => 53,
                'group' => 'blog',
                'key' => 'categories.empty',
                'text' => '{"en":"No categories","ch":null,"tr":"Kategori yok"}',
                'created_at' => '2022-07-16 10:44:37',
                'updated_at' => '2022-07-16 10:44:37',
            ),
            44 => 
            array (
                'id' => 54,
                'group' => 'blog',
                'key' => 'categories.action_add',
                'text' => '{"en":"Add category","ch":null,"tr":"Kategori ekle"}',
                'created_at' => '2022-07-16 10:55:15',
                'updated_at' => '2022-07-16 10:55:15',
            ),
            45 => 
            array (
                'id' => 55,
                'group' => 'menu',
                'key' => 'blog.categories',
                'text' => '{"en":"Categories","ch":null,"tr":"Kategoriler"}',
                'created_at' => '2022-07-21 07:34:59',
                'updated_at' => '2022-07-21 07:34:59',
            ),
            46 => 
            array (
                'id' => 56,
                'group' => 'blog',
                'key' => 'categories.title',
                'text' => '{"en":"Categories","ch":null,"tr":"Kategoriler"}',
                'created_at' => '2022-07-21 16:04:35',
                'updated_at' => '2022-07-21 16:04:35',
            ),
            47 => 
            array (
                'id' => 57,
                'group' => 'menu',
                'key' => 'blog.categories.title',
                'text' => '{"en":"Categories","ch":null,"tr":"Kategoriler"}',
                'created_at' => '2022-07-21 16:04:55',
                'updated_at' => '2022-07-21 16:04:55',
            ),
            48 => 
            array (
                'id' => 58,
                'group' => 'menu',
                'key' => 'blog.posts.title',
                'text' => '{"en":"Posts","ch":null,"tr":"Yaz\\u0131lar"}',
                'created_at' => '2022-07-21 16:05:10',
                'updated_at' => '2022-07-21 16:05:10',
            ),
            49 => 
            array (
                'id' => 59,
                'group' => 'blog',
                'key' => 'category.create.title',
                'text' => '{"en":"Category Name","ch":null,"tr":"Kategori \\u0130smi"}',
                'created_at' => '2022-07-22 05:25:16',
                'updated_at' => '2022-07-22 05:25:16',
            ),
            50 => 
            array (
                'id' => 60,
                'group' => 'blog',
                'key' => 'category.create.slug',
                'text' => '{"en":"Category Slug","ch":null,"tr":"Kategori Linki"}',
                'created_at' => '2022-07-22 05:25:33',
                'updated_at' => '2022-07-22 05:25:33',
            ),
            51 => 
            array (
                'id' => 61,
                'group' => 'blog',
                'key' => 'category.parent',
                'text' => '{"en":"Parent","ch":null,"tr":"\\u00dcst Kategori"}',
                'created_at' => '2022-07-22 05:25:55',
                'updated_at' => '2022-07-22 05:25:55',
            ),
            52 => 
            array (
                'id' => 62,
                'group' => 'blog',
                'key' => 'categories.no_parent',
                'text' => '{"en":"No Parent","ch":null,"tr":"Yok"}',
                'created_at' => '2022-07-22 05:26:19',
                'updated_at' => '2022-07-22 05:26:19',
            ),
            53 => 
            array (
                'id' => 63,
                'group' => 'blog',
                'key' => 'category.create.title',
                'text' => '{"en":"Add Category","ch":null,"tr":"Yeni Kategori"}',
                'created_at' => '2022-07-22 05:28:29',
                'updated_at' => '2022-07-22 05:28:29',
            ),
            54 => 
            array (
                'id' => 64,
                'group' => 'blog',
                'key' => 'category.list_title',
                'text' => '{"en":"Categories","ch":null,"tr":"Kategoriler"}',
                'created_at' => '2022-07-22 05:29:01',
                'updated_at' => '2022-07-22 05:29:01',
            ),
            55 => 
            array (
                'id' => 65,
                'group' => 'blog',
                'key' => 'category.title',
                'text' => '{"en":"Name","ch":null,"tr":"Kategori \\u0130smi"}',
                'created_at' => '2022-07-22 05:34:00',
                'updated_at' => '2022-07-22 05:34:00',
            ),
            56 => 
            array (
                'id' => 66,
                'group' => 'blog',
                'key' => 'category.slug',
                'text' => '{"en":"Slug","ch":null,"tr":"Link"}',
                'created_at' => '2022-07-22 05:34:10',
                'updated_at' => '2022-07-22 05:34:10',
            ),
            57 => 
            array (
                'id' => 67,
                'group' => 'blog',
                'key' => 'category.action.create',
                'text' => '{"en":"Create","ch":null,"tr":"Kaydet"}',
                'created_at' => '2022-07-22 05:34:54',
                'updated_at' => '2022-07-22 05:34:54',
            ),
            58 => 
            array (
                'id' => 68,
                'group' => 'blog',
                'key' => 'categories.no_categories',
                'text' => '{"en":"No Categories","ch":null,"tr":"Kategori Yok"}',
                'created_at' => '2022-07-22 06:19:03',
                'updated_at' => '2022-07-22 06:19:03',
            ),
            59 => 
            array (
                'id' => 69,
                'group' => 'subtitle',
                'key' => 'autogenerated',
                'text' => '{"en":"Autogenerated","ch":null,"tr":"Otomatik olu\\u015fur"}',
                'created_at' => '2022-07-22 06:20:22',
                'updated_at' => '2022-07-22 06:20:22',
            ),
            60 => 
            array (
                'id' => 70,
                'group' => 'menu',
                'key' => 'product.categories.title',
                'text' => '{"en":"Categories","ch":null,"tr":"Kategoriler"}',
                'created_at' => '2022-08-07 05:30:12',
                'updated_at' => '2022-08-07 05:30:12',
            ),
            61 => 
            array (
                'id' => 71,
                'group' => 'menu',
                'key' => 'product.title',
                'text' => '{"en":"All Products","ch":null,"tr":"T\\u00fcm \\u00dcr\\u00fcnler"}',
                'created_at' => '2022-08-07 05:30:32',
                'updated_at' => '2022-08-07 05:31:06',
            ),
            62 => 
            array (
                'id' => 72,
                'group' => 'menu',
                'key' => 'product.index',
                'text' => '{"en":"Products","ch":null,"tr":"\\u00dcr\\u00fcnler"}',
                'created_at' => '2022-08-07 05:30:53',
                'updated_at' => '2022-10-17 09:30:01',
            ),
            63 => 
            array (
                'id' => 73,
                'group' => 'action',
                'key' => 'table_actions',
                'text' => '{"en":"Actions","ch":null,"tr":"\\u0130\\u015flem"}',
                'created_at' => '2022-08-07 05:42:44',
                'updated_at' => '2022-08-07 05:42:44',
            ),
            64 => 
            array (
                'id' => 74,
                'group' => 'menu',
                'key' => 'attribute.title',
                'text' => '{"en":"Attributes","ch":null,"tr":null}',
                'created_at' => '2022-08-30 09:58:28',
                'updated_at' => '2022-08-30 09:58:28',
            ),
            65 => 
            array (
                'id' => 75,
                'group' => 'menu',
                'key' => 'log.title',
                'text' => '{"en":"Log","ch":"Log","tr":"Log"}',
                'created_at' => '2022-09-06 21:42:54',
                'updated_at' => '2022-09-06 22:08:26',
            ),
            66 => 
            array (
                'id' => 76,
                'group' => 'menu',
                'key' => 'system.title',
                'text' => '{"en":"System","ch":"System","tr":"Sistem","key":"system.title"}',
                'created_at' => '2022-09-06 21:50:33',
                'updated_at' => '2022-09-06 22:08:07',
            ),
            67 => 
            array (
                'id' => 77,
                'group' => 'menu',
                'key' => 'backup.title',
                'text' => '{"en":"Backup","ch":null,"tr":"Yedek"}',
                'created_at' => '2022-09-06 22:27:34',
                'updated_at' => '2022-09-06 22:28:04',
            ),
            68 => 
            array (
                'id' => 78,
                'group' => 'system',
                'key' => 'backup.create',
                'text' => '{"en":"Backup Now","ch":null,"tr":"Yedek Al"}',
                'created_at' => '2022-09-06 22:49:04',
                'updated_at' => '2022-09-06 22:49:17',
            ),
            69 => 
            array (
                'id' => 79,
                'group' => 'system',
                'key' => 'backup.title',
                'text' => '{"en":"System Backups","ch":null,"tr":"Sistem Yedekleri"}',
                'created_at' => '2022-09-06 23:02:29',
                'updated_at' => '2022-09-06 23:03:32',
            ),
            70 => 
            array (
                'id' => 80,
                'group' => 'menu',
                'key' => 'users.users',
                'text' => '{"en":"All Users","ch":null,"tr":"Kullan\\u0131c\\u0131lar"}',
                'created_at' => '2022-09-06 23:05:43',
                'updated_at' => '2022-09-13 13:30:13',
            ),
            71 => 
            array (
                'id' => 81,
                'group' => 'menu',
                'key' => 'users.roles',
                'text' => '{"en":"Roles","ch":null,"tr":"R\\u00f6ller"}',
                'created_at' => '2022-09-06 23:05:55',
                'updated_at' => '2022-09-06 23:05:55',
            ),
            72 => 
            array (
                'id' => 82,
                'group' => 'menu',
                'key' => 'tag.title',
                'text' => '{"en":"Tags","ch":null,"tr":"Taglar"}',
                'created_at' => '2022-09-07 20:30:05',
                'updated_at' => '2022-09-07 20:30:05',
            ),
            73 => 
            array (
                'id' => 83,
                'group' => 'dropzone',
                'key' => 'message',
                'text' => '{"en":"<h5>Drag and drop your file here<\\/h5>                    <p class=\\"mb-2\\">or<\\/p>                    <span class=\\"btn btn-white btn-sm\\">Browse files<\\/span>","ch":null,"tr":"<h5>Drag and drop your file here<\\/h5>                    <p class=\\"mb-2\\">or<\\/p>                    <span class=\\"btn btn-white btn-sm\\">Browse files<\\/span>"}',
                'created_at' => '2022-09-08 10:07:49',
                'updated_at' => '2022-09-08 10:07:49',
            ),
            74 => 
            array (
                'id' => 84,
                'group' => 'menu',
                'key' => 'variations.title',
                'text' => '{"en":"Variations","ch":null,"tr":"Varyasyonlar"}',
                'created_at' => '2022-10-08 06:24:59',
                'updated_at' => '2022-10-08 06:24:59',
            ),
            75 => 
            array (
                'id' => 85,
                'group' => 'menu',
                'key' => 'brand.title',
                'text' => '{"en":"Brands","ch":null,"tr":"Markalar"}',
                'created_at' => '2022-10-12 12:34:07',
                'updated_at' => '2022-10-12 12:34:07',
            ),
            76 => 
            array (
                'id' => 86,
                'group' => 'breadcrumbs',
                'key' => 'translations.index',
                'text' => '{"en":"Translations","ch":null,"tr":"\\u00c7eviriler"}',
                'created_at' => '2022-10-17 10:44:09',
                'updated_at' => '2022-10-17 10:44:09',
            ),
            77 => 
            array (
                'id' => 87,
                'group' => 'menu',
                'key' => 'shipping_class.title',
                'text' => '{"en":"Shipping Classes","ch":null,"tr":"G\\u00f6nderim T\\u00fcrleri"}',
                'created_at' => '2022-10-25 19:23:05',
                'updated_at' => '2022-10-27 11:44:33',
            ),
            78 => 
            array (
                'id' => 88,
                'group' => 'menu',
                'key' => 'shipping_methods.title',
                'text' => '{"en":"Shipping Methods"}',
                'created_at' => '2023-08-12 07:07:40',
                'updated_at' => '2023-08-12 07:07:40',
            ),
            79 => 
            array (
                'id' => 89,
                'group' => 'menu',
                'key' => 'shipping_methods.title',
                'text' => '{"en":"Shipping Methods"}',
                'created_at' => '2023-08-12 07:07:40',
                'updated_at' => '2023-08-12 07:07:40',
            ),
            80 => 
            array (
                'id' => 90,
                'group' => 'menu',
                'key' => 'shipping_zones.title',
                'text' => '{"en":"Shipping Zones"}',
                'created_at' => '2023-08-12 07:07:56',
                'updated_at' => '2023-08-12 07:07:56',
            ),
            81 => 
            array (
                'id' => 91,
                'group' => 'menu',
                'key' => 'shipping_zones.title',
                'text' => '{"en":"Shipping Zones"}',
                'created_at' => '2023-08-12 07:07:56',
                'updated_at' => '2023-08-12 07:07:56',
            ),
            82 => 
            array (
                'id' => 92,
                'group' => 'menu',
                'key' => 'order.title',
                'text' => '{"en":"Bids"}',
                'created_at' => '2023-08-12 07:08:07',
                'updated_at' => '2023-08-12 21:52:34',
            ),
            83 => 
            array (
                'id' => 93,
                'group' => 'menu',
                'key' => 'order.title',
                'text' => '{"en":"Bids"}',
                'created_at' => '2023-08-12 07:08:08',
                'updated_at' => '2023-08-12 21:52:35',
            ),
            84 => 
            array (
                'id' => 94,
                'group' => 'menu',
                'key' => 'customer.title',
                'text' => '{"en":"Customers"}',
                'created_at' => '2023-08-12 07:08:16',
                'updated_at' => '2023-08-12 07:08:16',
            ),
            85 => 
            array (
                'id' => 95,
                'group' => 'menu',
                'key' => 'customer.title',
                'text' => '{"en":"Customers"}',
                'created_at' => '2023-08-12 07:08:16',
                'updated_at' => '2023-08-12 07:08:16',
            ),
            86 => 
            array (
                'id' => 96,
                'group' => 'menu',
                'key' => 'promocodes.title',
                'text' => '{"en":"Promocodes"}',
                'created_at' => '2023-08-12 07:08:27',
                'updated_at' => '2023-08-12 07:08:27',
            ),
            87 => 
            array (
                'id' => 97,
                'group' => 'menu',
                'key' => 'promocodes.title',
                'text' => '{"en":"Promocodes"}',
                'created_at' => '2023-08-12 07:08:27',
                'updated_at' => '2023-08-12 07:08:27',
            ),
            88 => 
            array (
                'id' => 98,
                'group' => 'menu',
                'key' => 'static_content.title',
                'text' => '{"en":"Static Content"}',
                'created_at' => '2023-08-12 07:08:45',
                'updated_at' => '2023-08-12 07:08:45',
            ),
            89 => 
            array (
                'id' => 99,
                'group' => 'menu',
                'key' => 'static_content.title',
                'text' => '{"en":"Static Content"}',
                'created_at' => '2023-08-12 07:08:45',
                'updated_at' => '2023-08-12 07:08:45',
            ),
            90 => 
            array (
                'id' => 100,
                'group' => 'menu',
                'key' => 'static_content_structure.title',
                'text' => '{"en":"Content Structure"}',
                'created_at' => '2023-08-12 07:09:02',
                'updated_at' => '2023-08-12 07:09:02',
            ),
            91 => 
            array (
                'id' => 101,
                'group' => 'menu',
                'key' => 'static_content_structure.title',
                'text' => '{"en":"Content Structure"}',
                'created_at' => '2023-08-12 07:09:02',
                'updated_at' => '2023-08-12 07:09:02',
            ),
            92 => 
            array (
                'id' => 102,
                'group' => 'menu',
                'key' => 'filemanager.title',
                'text' => '{"en":"Filemanager"}',
                'created_at' => '2023-08-12 07:09:13',
                'updated_at' => '2023-08-12 07:09:13',
            ),
            93 => 
            array (
                'id' => 103,
                'group' => 'menu',
                'key' => 'filemanager.title',
                'text' => '{"en":"Filemanager"}',
                'created_at' => '2023-08-12 07:09:13',
                'updated_at' => '2023-08-12 07:09:13',
            ),
            94 => 
            array (
                'id' => 104,
                'group' => 'menu',
                'key' => 'shipping.title',
                'text' => '{"en":"Shipping"}',
                'created_at' => '2023-08-12 07:09:42',
                'updated_at' => '2023-08-12 07:09:42',
            ),
            95 => 
            array (
                'id' => 105,
                'group' => 'menu',
                'key' => 'shipping.title',
                'text' => '{"en":"Shipping"}',
                'created_at' => '2023-08-12 07:09:43',
                'updated_at' => '2023-08-12 07:09:43',
            ),
            96 => 
            array (
                'id' => 106,
                'group' => 'menu',
                'key' => 'menu-builder.index',
                'text' => '{"en":"Menu Builder"}',
                'created_at' => '2023-08-12 07:10:10',
                'updated_at' => '2023-08-12 07:10:10',
            ),
            97 => 
            array (
                'id' => 107,
                'group' => 'menu',
                'key' => 'menu-builder.index',
                'text' => '{"en":"Menu Builder"}',
                'created_at' => '2023-08-12 07:10:10',
                'updated_at' => '2023-08-12 07:10:10',
            ),
            98 => 
            array (
                'id' => 108,
                'group' => 'system',
                'key' => 'theme.style.auto',
            'text' => '{"en":"Auto (system default)"}',
                'created_at' => '2023-08-12 07:12:53',
                'updated_at' => '2023-08-12 07:12:53',
            ),
            99 => 
            array (
                'id' => 109,
                'group' => 'system',
                'key' => 'theme.style.auto',
            'text' => '{"en":"Auto (system default)"}',
                'created_at' => '2023-08-12 07:12:54',
                'updated_at' => '2023-08-12 07:12:54',
            ),
            100 => 
            array (
                'id' => 110,
                'group' => 'system',
                'key' => 'theme.style.light',
            'text' => '{"en":"Default (light mode)"}',
                'created_at' => '2023-08-12 07:13:28',
                'updated_at' => '2023-08-12 07:13:28',
            ),
            101 => 
            array (
                'id' => 111,
                'group' => 'system',
                'key' => 'theme.style.light',
            'text' => '{"en":"Default (light mode)"}',
                'created_at' => '2023-08-12 07:13:29',
                'updated_at' => '2023-08-12 07:13:29',
            ),
            102 => 
            array (
                'id' => 112,
                'group' => 'system',
                'key' => 'theme.style.dark',
                'text' => '{"en":"Dark"}',
                'created_at' => '2023-08-12 07:13:51',
                'updated_at' => '2023-08-12 07:13:51',
            ),
            103 => 
            array (
                'id' => 113,
                'group' => 'system',
                'key' => 'theme.style.dark',
                'text' => '{"en":"Dark"}',
                'created_at' => '2023-08-12 07:13:52',
                'updated_at' => '2023-08-12 07:13:52',
            ),
            104 => 
            array (
                'id' => 114,
                'group' => 'main',
                'key' => 'language_menu.title',
                'text' => '{"en":"Language"}',
                'created_at' => '2023-08-12 07:14:26',
                'updated_at' => '2023-08-12 07:15:06',
            ),
            105 => 
            array (
                'id' => 115,
                'group' => 'menu',
                'key' => 'language_menu.title',
                'text' => '{"en":"Language"}',
                'created_at' => '2023-08-12 07:14:26',
                'updated_at' => '2023-08-12 07:14:26',
            ),
            106 => 
            array (
                'id' => 116,
                'group' => 'settings',
                'key' => 'app_name',
                'text' => '{"en":"Application Name"}',
                'created_at' => '2023-08-13 08:16:58',
                'updated_at' => '2023-08-13 08:16:58',
            ),
            107 => 
            array (
                'id' => 117,
                'group' => 'settings',
                'key' => 'app_name',
                'text' => '{"en":"Application Name"}',
                'created_at' => '2023-08-13 08:16:58',
                'updated_at' => '2023-08-13 08:16:58',
            ),
            108 => 
            array (
                'id' => 118,
                'group' => 'settings',
                'key' => 'app_url',
                'text' => '{"en":"Application Url"}',
                'created_at' => '2023-08-13 08:17:11',
                'updated_at' => '2023-08-13 08:17:11',
            ),
            109 => 
            array (
                'id' => 119,
                'group' => 'settings',
                'key' => 'app_url',
                'text' => '{"en":"Application Url"}',
                'created_at' => '2023-08-13 08:17:12',
                'updated_at' => '2023-08-13 08:17:12',
            ),
            110 => 
            array (
                'id' => 120,
                'group' => 'settings',
                'key' => 'site_description',
                'text' => '{"en":"SEO Description"}',
                'created_at' => '2023-08-13 08:17:32',
                'updated_at' => '2023-08-13 08:17:32',
            ),
            111 => 
            array (
                'id' => 121,
                'group' => 'settings',
                'key' => 'site_description',
                'text' => '{"en":"SEO Description"}',
                'created_at' => '2023-08-13 08:17:32',
                'updated_at' => '2023-08-13 08:17:32',
            ),
            112 => 
            array (
                'id' => 122,
                'group' => 'settings',
                'key' => 'site_keywords',
                'text' => '{"en":"SEO Keywords"}',
                'created_at' => '2023-08-13 08:17:42',
                'updated_at' => '2023-08-13 08:17:42',
            ),
            113 => 
            array (
                'id' => 123,
                'group' => 'settings',
                'key' => 'site_keywords',
                'text' => '{"en":"SEO Keywords"}',
                'created_at' => '2023-08-13 08:17:42',
                'updated_at' => '2023-08-13 08:17:42',
            ),
            114 => 
            array (
                'id' => 124,
                'group' => 'settings',
                'key' => 'logo_light',
                'text' => '{"en":"Light Logo"}',
                'created_at' => '2023-08-13 08:17:56',
                'updated_at' => '2023-08-13 08:17:56',
            ),
            115 => 
            array (
                'id' => 125,
                'group' => 'settings',
                'key' => 'logo_light',
                'text' => '{"en":"Light Logo"}',
                'created_at' => '2023-08-13 08:17:56',
                'updated_at' => '2023-08-13 08:17:56',
            ),
            116 => 
            array (
                'id' => 126,
                'group' => 'settings',
                'key' => 'logo_dark',
                'text' => '{"en":"Dark Logo"}',
                'created_at' => '2023-08-13 08:18:05',
                'updated_at' => '2023-08-13 08:18:05',
            ),
            117 => 
            array (
                'id' => 127,
                'group' => 'settings',
                'key' => 'logo_dark',
                'text' => '{"en":"Dark Logo"}',
                'created_at' => '2023-08-13 08:18:05',
                'updated_at' => '2023-08-13 08:18:05',
            ),
            118 => 
            array (
                'id' => 128,
                'group' => 'settings',
                'key' => 'favicon',
                'text' => '{"en":"Favicon"}',
                'created_at' => '2023-08-13 08:18:18',
                'updated_at' => '2023-08-13 08:18:18',
            ),
            119 => 
            array (
                'id' => 129,
                'group' => 'settings',
                'key' => 'favicon',
                'text' => '{"en":"Favicon"}',
                'created_at' => '2023-08-13 08:18:18',
                'updated_at' => '2023-08-13 08:18:18',
            ),
            120 => 
            array (
                'id' => 130,
                'group' => 'settings',
                'key' => 'product_placeholder_image',
                'text' => '{"en":"Product Image Placeholder"}',
                'created_at' => '2023-08-13 08:18:31',
                'updated_at' => '2023-08-13 08:18:31',
            ),
            121 => 
            array (
                'id' => 131,
                'group' => 'settings',
                'key' => 'product_placeholder_image',
                'text' => '{"en":"Product Image Placeholder"}',
                'created_at' => '2023-08-13 08:18:31',
                'updated_at' => '2023-08-13 08:18:31',
            ),
            122 => 
            array (
                'id' => 132,
                'group' => 'settings',
                'key' => 'post_placeholder_image',
                'text' => '{"en":"Blog Image Placeholder"}',
                'created_at' => '2023-08-13 08:18:39',
                'updated_at' => '2023-08-13 08:18:39',
            ),
            123 => 
            array (
                'id' => 133,
                'group' => 'settings',
                'key' => 'post_placeholder_image',
                'text' => '{"en":"Blog Image Placeholder"}',
                'created_at' => '2023-08-13 08:18:39',
                'updated_at' => '2023-08-13 08:18:39',
            ),
            124 => 
            array (
                'id' => 134,
                'group' => 'settings',
                'key' => 'host',
                'text' => '{"en":"Host"}',
                'created_at' => '2023-08-13 08:19:28',
                'updated_at' => '2023-08-13 08:19:28',
            ),
            125 => 
            array (
                'id' => 135,
                'group' => 'settings',
                'key' => 'host',
                'text' => '{"en":"Host"}',
                'created_at' => '2023-08-13 08:19:28',
                'updated_at' => '2023-08-13 08:19:28',
            ),
            126 => 
            array (
                'id' => 136,
                'group' => 'settings',
                'key' => 'username',
                'text' => '{"en":"Username"}',
                'created_at' => '2023-08-13 08:19:37',
                'updated_at' => '2023-08-13 08:19:37',
            ),
            127 => 
            array (
                'id' => 137,
                'group' => 'settings',
                'key' => 'username',
                'text' => '{"en":"Username"}',
                'created_at' => '2023-08-13 08:19:37',
                'updated_at' => '2023-08-13 08:19:37',
            ),
            128 => 
            array (
                'id' => 138,
                'group' => 'settings',
                'key' => 'password',
                'text' => '{"en":"Password"}',
                'created_at' => '2023-08-13 08:19:45',
                'updated_at' => '2023-08-13 08:19:45',
            ),
            129 => 
            array (
                'id' => 139,
                'group' => 'settings',
                'key' => 'password',
                'text' => '{"en":"Password"}',
                'created_at' => '2023-08-13 08:19:45',
                'updated_at' => '2023-08-13 08:19:45',
            ),
            130 => 
            array (
                'id' => 140,
                'group' => 'settings',
                'key' => 'port',
                'text' => '{"en":"Port"}',
                'created_at' => '2023-08-13 08:19:54',
                'updated_at' => '2023-08-13 08:19:54',
            ),
            131 => 
            array (
                'id' => 141,
                'group' => 'settings',
                'key' => 'port',
                'text' => '{"en":"Port"}',
                'created_at' => '2023-08-13 08:19:54',
                'updated_at' => '2023-08-13 08:19:54',
            ),
            132 => 
            array (
                'id' => 142,
                'group' => 'settings',
                'key' => 'encryption',
                'text' => '{"en":"Encryption"}',
                'created_at' => '2023-08-13 08:20:02',
                'updated_at' => '2023-08-13 08:20:02',
            ),
            133 => 
            array (
                'id' => 143,
                'group' => 'settings',
                'key' => 'encryption',
                'text' => '{"en":"Encryption"}',
                'created_at' => '2023-08-13 08:20:02',
                'updated_at' => '2023-08-13 08:20:02',
            ),
            134 => 
            array (
                'id' => 144,
                'group' => 'settings',
                'key' => 'site_url',
                'text' => '{"en":"Site Url"}',
                'created_at' => '2023-08-13 08:35:23',
                'updated_at' => '2023-08-13 08:35:23',
            ),
            135 => 
            array (
                'id' => 145,
                'group' => 'settings',
                'key' => 'site_url',
                'text' => '{"en":"Site Url"}',
                'created_at' => '2023-08-13 08:35:23',
                'updated_at' => '2023-08-13 08:35:23',
            ),
        ));
        
        
    }
}