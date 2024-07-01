# Sınırsız Kategori Uygulaması

Bu uygulama, PHP ve MySQL kullanılarak geliştirilmiş sınırsız kategori yönetim sistemi sağlar. Kategorileri hiyerarşik olarak yönetebilir, alt kategoriler ekleyebilir, güncelleyebilir ve silebilirsiniz.

## Kurulum

1. **Veritabanı Oluşturma:**
   - Öncelikle, `baglan.php` dosyasında veritabanı bağlantı bilgilerinizi güncelleyin.
   - MySQL üzerinde aşağıdaki gibi bir `menuler` tablosu oluşturun:

     ```sql
     CREATE TABLE menuler (
         id INT AUTO_INCREMENT PRIMARY KEY,
         ustid INT,
         menuadi VARCHAR(255) NOT NULL
     );
     ```

2. **Dosyaları Sunucuya Yükleme:**
   - Tüm dosyaları sunucunuza veya localhost ortamınıza yükleyin.

3. **Çalıştırma:**
   - Tarayıcınızda uygulamayı çalıştırın (`index.php`).

## Kullanım

- **Menü Ekleme:**
  - Ana sayfa üzerinden "Menu Ekleme Formu"nu kullanarak yeni menüler ekleyebilirsiniz. Üst menü seçeneği ile menüyü bir üst menü altında oluşturabilirsiniz.
  
- **Menü Güncelleme ve Silme:**
  - Listelenen her menünün yanında "Güncelle" ve "Sil" bağlantıları bulunur. Bu bağlantıları kullanarak ilgili menüyü güncelleyebilir veya silebilirsiniz.

- **Menüleri Listeleme:**
  - Tüm menüler hiyerarşik olarak listelenir. Alt menüler, ilgili üst menünün altında girintili olarak gösterilir.
