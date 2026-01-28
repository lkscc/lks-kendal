Markdown
# 🚀 LKS Cloud Computing - Global E-Commerce Project

Selamat datang di repositori proyek migrasi infrastruktur **Global E-Commerce**. Sebagai Cloud Engineer, Anda ditugaskan untuk mengimplementasikan kode aplikasi ini ke dalam infrastruktur AWS yang aman dan memiliki ketersediaan tinggi (High Availability).

## 📋 Struktur Repositori
* `index.php`: Dashboard utama aplikasi (digunakan untuk audit Juri).
* `db_config.php`: File konfigurasi koneksi database.
* `db_setup.sql`: Skrip inisialisasi tabel database MySQL.

## 🛠️ Instruksi Implementasi

### 1. Penyiapan Server (Modul Pagi)
Gunakan perintah berikut di dalam terminal EC2 (Amazon Linux 2023) untuk menarik kode ini:
```bash
sudo dnf update -y
sudo dnf install httpd php php-mysqli git -y
sudo systemctl start httpd
sudo systemctl enable httpd
cd /var/www/html
sudo git clone [https://github.com/lkscc/lks-kendal.git](https://github.com/lkscc/lks-kendal.git) .
sudo chown -R apache:apache /var/www/html
2. Konfigurasi Database (Modul Siang)
Setelah instance RDS MySQL Multi-AZ Anda siap:
    1. Jalankan skrip db_setup.sql melalui terminal atau tool database (HeidiSQL) untuk membuat tabel.
    2. Edit file db_config.php dan sesuaikan nilainya dengan detail RDS Anda:
        ◦ DB_SERVER: Endpoint RDS Anda.
        ◦ DB_USERNAME: admin_lks (sesuai soal).
        ◦ DB_PASSWORD: Password yang Anda tentukan.
3. Verifikasi & Audit
Buka IP Publik EC2 Anda di browser. Pastikan:
    • Server AZ menampilkan lokasi Availability Zone yang sesuai.
    • Database Status menunjukkan warna hijau atau tulisan "Connected".
⚠️ Catatan Penting: Pastikan Security Group Anda mengizinkan akses HTTP (80) untuk publik dan SSH (22) khusus untuk IP Juri agar sistem dapat diaudit.

### Cara Membuatnya di GitHub:
1. Klik **"Add file"** > **"Create new file"**.
2. Beri nama file: `README.md`.
3. **Paste** kode markdown di atas.
4. Klik **"Commit changes..."**.
