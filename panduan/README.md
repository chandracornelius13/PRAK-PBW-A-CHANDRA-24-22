# 🚀 Panduan Lengkap Git & GitHub Workflow

Dokumentasi praktis pengelolaan proyek menggunakan **Git dan GitHub**. Panduan ini mencakup 15 skenario workflow, mulai dari inisialisasi repository, push rutin, pengelolaan file, kolaborasi menggunakan branch, Pull Request, hingga penanganan konflik.

Panduan ini dapat digunakan untuk proyek pribadi maupun proyek kelompok, termasuk proyek praktikum Laravel.

---

## 📌 Daftar Isi

1. Inisialisasi & Hubungkan Repository Baru (Initial Push)
2. Push Rutin Sehari-hari (Daily Workflow)
3. Memperbarui File atau Folder Spesifik
4. Menghapus & Mengganti File atau Folder
5. Clone Repository & Workflow Setelah Clone
6. Menangani Push Rejected (Fetch First)
7. Bekerja dengan Branch Baru (Feature Branch)
8. Kolaborasi Tim Menggunakan Pull Request
9. Sinkronisasi Branch dengan Main
10. Menangani Merge Conflict
11. Membatalkan Perubahan (Undo Changes)
12. Mengatur File Menggunakan .gitignore
13. Mengecek Repository & Riwayat Commit
14. Mengganti Remote Repository
15. Force Push (Kondisi Darurat)

---

## 1. Inisialisasi & Hubungkan Repository Baru (Initial Push)

**Fungsi:** Digunakan saat pertama kali membuat proyek di laptop dan ingin mengunggahnya ke repository GitHub yang masih kosong.

```bash
# Inisialisasi Git pada direktori lokal
git init

# Tandai seluruh file dalam folder
git add -A

# Simpan riwayat perubahan pertama
git commit -m "initial commit"

# Ubah nama branch utama menjadi main
git branch -M main

# Hubungkan repository lokal ke GitHub
git remote add origin https://github.com/USERNAME/REPOSITORY.git

# Periksa koneksi remote
git remote -v

# Push pertama kali sekaligus mengatur upstream
git push -u origin main
```

**Catatan:**
- Ganti URL repository sesuai repository GitHub milikmu.
- `git remote -v` digunakan untuk memastikan alamat repository sudah benar.
- `-u` digunakan untuk menghubungkan branch lokal dengan branch remote sehingga push berikutnya cukup menggunakan `git push`.

---

## 2. Push Rutin Sehari-hari (Daily Workflow)

**Fungsi:** Alur standar untuk memperbarui proyek yang sudah terhubung dengan GitHub.

```bash
# Ambil pembaruan terbaru dari GitHub
git pull

# Periksa perubahan file
git status

# Tandai seluruh perubahan
git add -A

# Simpan perubahan
git commit -m "feat: menambahkan fitur baru"

# Unggah perubahan ke GitHub
git push
```

**Catatan:**
- Biasakan menjalankan `git pull` sebelum mulai bekerja.
- Gunakan `git status` untuk memastikan file yang akan di-commit.
- Gunakan pesan commit yang menggambarkan perubahan.
- Jika tidak ada perubahan, Git tidak akan membuat commit baru.

Contoh format commit:

```bash
git commit -m "feat: menambahkan fitur login"
git commit -m "fix: memperbaiki validasi form"
git commit -m "style: memperbaiki tampilan halaman dashboard"
git commit -m "docs: memperbarui dokumentasi README"
git commit -m "chore: memperbarui konfigurasi proyek"
```

---

## 3. Memperbarui File atau Folder Spesifik

**Fungsi:** Digunakan jika hanya ingin mengunggah file atau folder tertentu tanpa mengikutsertakan perubahan lainnya.

```bash
# Periksa perubahan
git status

# Tambahkan satu file spesifik
git add app/Models/Book.php

# ATAU tambahkan folder tertentu
git add public/assets/

# Simpan perubahan
git commit -m "feat: memperbarui model dan aset aplikasi"

# Push ke GitHub
git push
```

**Jika salah memilih file dan ingin membatalkan staging:**

```bash
# Membatalkan staging satu file
git restore --staged nama_file.php

# Membatalkan staging seluruh file
git restore --staged .
```

Catatan: Perintah tersebut hanya mengeluarkan file dari staging area, bukan menghapus perubahan pada file lokal.

---

## 4. Menghapus & Mengganti File atau Folder

**Fungsi:** Menghapus file dari repository, menghapus pelacakan file tanpa menghapus file lokal, atau mengganti folder lama dengan versi baru.

### A. Menghapus File/Folder dari Lokal & GitHub

```bash
# Menghapus satu file
git rm nama_file.txt

# Menghapus folder beserta isinya
git rm -r nama_folder/

# Simpan perubahan
git commit -m "chore: menghapus file yang tidak digunakan"

# Push ke GitHub
git push
```

### B. Menghapus dari GitHub Saja (Tetap Menyimpan File Lokal)

```bash
# Menghapus pelacakan satu file
git rm --cached nama_file.txt

# Menghapus pelacakan satu folder
git rm -r --cached nama_folder/

# Simpan perubahan
git commit -m "chore: menghapus file dari repository"

# Push ke GitHub
git push
```

### C. Mengganti File/Folder Lama dengan Versi Baru

Jika folder lama dihapus kemudian diganti dengan folder baru bernama sama:

```bash
# Tandai seluruh perubahan termasuk penambahan dan penghapusan
git add -A

# Simpan perubahan
git commit -m "update: mengganti folder aset dengan versi terbaru"

# Push ke GitHub
git push
```

**Catatan:** `git add -A` lebih direkomendasikan untuk memastikan seluruh perubahan, termasuk penghapusan file, ikut masuk ke staging area.

---

## 5. Clone Repository & Workflow Setelah Clone

**Fungsi:** Mengunduh repository dari GitHub ke komputer atau folder baru, kemudian melanjutkan pengembangan proyek.

```bash
# Clone repository
git clone https://github.com/USERNAME/REPOSITORY.git

# Masuk ke direktori proyek
cd NAMA-REPOSITORY

# Periksa branch aktif
git branch

# Periksa remote repository
git remote -v

# Ambil pembaruan terbaru
git pull

# Lakukan perubahan pada proyek melalui code editor

# Periksa perubahan
git status

# Tandai seluruh perubahan
git add -A

# Commit perubahan
git commit -m "update: memperbarui proyek setelah clone"

# Push ke GitHub
git push
```

### Jika Ingin Berpindah ke Branch Lain

```bash
# Melihat seluruh branch
git branch -a

# Berpindah ke branch yang sudah ada secara lokal
git switch nama-branch

# Mengambil informasi branch terbaru dari GitHub
git fetch origin

# Berpindah ke branch remote yang belum tersedia secara lokal
git switch -c nama-branch --track origin/nama-branch
```

---

## 6. Menangani Push Rejected (Fetch First)

**Fungsi:** Mengatasi kondisi ketika push ditolak karena repository GitHub memiliki commit yang belum dimiliki oleh repository lokal.

```bash
# Ambil pembaruan dari remote dan susun ulang commit lokal
git pull origin main --rebase

# Push kembali setelah sinkronisasi
git push origin main
```

Jika terjadi konflik ketika proses rebase:

```bash
# Periksa file yang mengalami konflik
git status

# Setelah konflik diperbaiki, tandai file
git add nama_file.php

# Lanjutkan proses rebase
git rebase --continue

# Setelah selesai, push kembali
git push origin main
```

Jika ingin membatalkan proses rebase:

```bash
git rebase --abort
```

---

## 7. Bekerja dengan Branch Baru (Feature Branch)

**Fungsi:** Membuat cabang kerja terpisah agar pengembangan fitur tidak langsung mengubah branch utama `main`.

```bash
# Pastikan berada di branch main
git switch main

# Ambil pembaruan terbaru
git pull origin main

# Buat branch baru sekaligus berpindah ke branch tersebut
git switch -c fitur-baru

# Lakukan perubahan pada proyek

# Tambahkan perubahan
git add -A

# Simpan commit
git commit -m "feat: menambahkan modul fitur baru"

# Push branch ke GitHub
git push -u origin fitur-baru
```

### Berpindah Kembali ke Main

```bash
git switch main
```

### Melihat Branch yang Tersedia

```bash
# Branch lokal
git branch

# Branch lokal dan remote
git branch -a
```

**Catatan:** Branch digunakan untuk memisahkan pekerjaan. Sebaiknya setiap fitur atau pekerjaan anggota tim memiliki branch masing-masing.

---

## 8. Kolaborasi Tim Menggunakan Pull Request

**Fungsi:** Digunakan ketika beberapa anggota mengerjakan proyek yang sama menggunakan branch masing-masing. Perubahan tidak langsung dimasukkan ke `main`, tetapi diperiksa terlebih dahulu melalui Pull Request (PR).

### A. Anggota Tim

```bash
# Ambil pembaruan main
git switch main
git pull origin main

# Buat branch pekerjaan
git switch -c fitur-login

# Lakukan coding

# Commit perubahan
git add -A
git commit -m "feat: menambahkan fitur login"

# Push branch
git push -u origin fitur-login
```

### B. Membuat Pull Request di GitHub

1. Buka repository di GitHub.
2. Pilih menu Pull Requests.
3. Klik New Pull Request.
4. Atur base menjadi `main`.
5. Atur compare menjadi branch pekerjaan, misalnya `fitur-login`.
6. Periksa perubahan kode.
7. Klik Create Pull Request.
8. Anggota lain atau ketua tim melakukan review.
9. Jika sudah sesuai, klik Merge Pull Request.

### C. Setelah Pull Request Berhasil Di-merge

```bash
# Kembali ke main
git switch main

# Ambil hasil merge terbaru
git pull origin main

# Hapus branch lokal yang sudah selesai
git branch -d fitur-login

# Hapus branch remote jika sudah tidak diperlukan
git push origin --delete fitur-login
```

**Catatan penting untuk proyek kelompok:**
- Gunakan satu branch untuk setiap anggota atau pekerjaan.
- Hindari mengerjakan perubahan langsung pada `main`.
- Aktifkan Branch Protection pada `main` jika repository digunakan bersama.
- Atur agar perubahan ke `main` harus melalui Pull Request.
- Jangan menghapus branch yang masih digunakan anggota lain.

---

## 9. Sinkronisasi Branch dengan Main

**Fungsi:** Memperbarui branch pekerjaan dengan perubahan terbaru dari `main`, terutama ketika anggota tim lain sudah melakukan merge fitur ke branch utama.

```bash
# Berpindah ke branch pekerjaan
git switch fitur-baru

# Ambil informasi terbaru dari GitHub
git fetch origin

# Gabungkan pembaruan main ke branch pekerjaan
git merge origin/main
```

Alternatif menggunakan rebase:

```bash
# Berpindah ke branch pekerjaan
git switch fitur-baru

# Susun ulang commit berdasarkan main terbaru
git rebase origin/main
```

**Catatan:**
- `merge` menggabungkan perubahan dan dapat membuat merge commit.
- `rebase` menyusun ulang commit agar riwayat lebih linear.
- Untuk branch yang digunakan bersama, merge biasanya lebih aman karena tidak menulis ulang riwayat commit.

---

## 10. Menangani Merge Conflict

**Fungsi:** Menyelesaikan konflik ketika dua perubahan berbeda terjadi pada bagian file yang sama, sehingga Git tidak dapat menentukan perubahan mana yang harus dipertahankan secara otomatis.

### A. Mengenali Merge Conflict

Contoh kondisi konflik:

```text
<<<<<<< HEAD
<h1>Dashboard Admin</h1>
=======
<h1>Dashboard Utama</h1>
>>>>>>> origin/main
```

Keterangan:
- `<<<<<<< HEAD` : Menandakan perubahan dari branch lokal yang sedang aktif (Current Change).
- `=======` : Pemisah antara perubahan lokal dan perubahan yang masuk.
- `>>>>>>> origin/main` : Menandakan perubahan dari branch remote `main` (Incoming Change).

### B. Menyelesaikan Konflik Melalui VS Code

Ketika terjadi konflik, VS Code biasanya menampilkan beberapa pilihan berikut:

| Pilihan | Fungsi |
|---|---|
| Accept Current Change | Mempertahankan perubahan dari branch lokal. |
| Accept Incoming Change | Mempertahankan perubahan dari branch remote. |
| Accept Both Changes | Mempertahankan kedua perubahan sekaligus. |
| Compare Changes | Membandingkan kedua versi kode sebelum menentukan pilihan. |

**Contoh penggunaan:**

Jika terdapat dua perubahan:

```html
<!-- Current Change -->
<h1>Dashboard Admin</h1>

<!-- Incoming Change -->
<h1>Dashboard Utama</h1>
```

Jika memilih:
- **Accept Current Change:** Hasilnya `<h1>Dashboard Admin</h1>`.
- **Accept Incoming Change:** Hasilnya `<h1>Dashboard Utama</h1>`.
- **Accept Both Changes:** Kedua kode dipertahankan dan perlu diperiksa kembali apakah memang keduanya diperlukan.

### C. Langkah Penyelesaian

1. Jalankan `git status` untuk melihat file yang mengalami konflik.
2. Buka file yang mengalami konflik melalui VS Code.
3. Periksa bagian kode yang bertabrakan.
4. Pilih perubahan yang ingin dipertahankan melalui pilihan yang tersedia.
5. Jika diperlukan, gabungkan kedua perubahan secara manual.
6. Pastikan seluruh penanda konflik (`<<<<<<<`, `=======`, dan `>>>>>>>`) sudah dihapus.
7. Simpan file setelah konflik selesai diperbaiki.

### D. Menyelesaikan Proses Merge

Setelah seluruh konflik diperbaiki, jalankan:

```bash
# Periksa kembali status repository
git status

# Tandai file yang sudah diperbaiki
git add -A

# Selesaikan proses merge
git commit

# Push hasil penyelesaian ke GitHub
git push
```

**Jika konflik terjadi saat proses Rebase**, gunakan perintah berikut setelah file diperbaiki:

```bash
# Tandai file yang sudah diperbaiki
git add -A

# Lanjutkan proses rebase
git rebase --continue

# Push setelah rebase selesai
git push
```

### E. Membatalkan Proses Konflik

Jika ingin membatalkan proses penggabungan yang sedang berlangsung:

```bash
# Membatalkan proses merge
git merge --abort

# ATAU membatalkan proses rebase
git rebase --abort
```

**Catatan Penting:**
- Jangan langsung memilih perubahan tanpa memeriksa isi kode.
- `Accept Both Changes` tidak selalu menjadi pilihan terbaik karena bisa menyebabkan kode ganda.
- Pastikan tidak ada penanda konflik yang tertinggal sebelum melakukan commit.
- Merge Conflict merupakan kondisi normal dalam kolaborasi Git, terutama ketika beberapa anggota mengubah file yang sama.
- Untuk proyek kelompok, komunikasikan perubahan dengan anggota lain agar tidak kehilangan kode yang sudah dibuat.

**Fungsi:** Menyelesaikan konflik ketika dua perubahan berbeda terjadi pada bagian file yang sama.

Contoh kondisi konflik:

```text
<<<<<<< HEAD
<h1>Dashboard Admin</h1>
=======
<h1>Dashboard Utama</h1>
>>>>>>> origin/main
```

### Langkah Penyelesaian

1. Jalankan `git status` untuk melihat file yang konflik.
2. Buka file tersebut melalui code editor.
3. Periksa kedua versi perubahan.
4. Tentukan kode yang ingin dipertahankan.
5. Hapus penanda konflik seperti `<<<<<<<`, `=======`, dan `>>>>>>>`.
6. Simpan file.

Setelah selesai:

```bash
# Tandai file yang sudah diperbaiki
git add nama_file.php

# Jika sedang melakukan merge, selesaikan merge
git commit

# Jika sedang melakukan rebase, lanjutkan rebase
git rebase --continue
```

Jika ingin membatalkan merge yang belum selesai:

```bash
git merge --abort
```

Jika ingin membatalkan rebase:

```bash
git rebase --abort
```

**Catatan:** Jangan langsung menghapus seluruh kode salah satu anggota tanpa memeriksa perubahan yang dibuat.

---

## 11. Membatalkan Perubahan (Undo Changes)

**Fungsi:** Mengembalikan file ke kondisi sebelumnya jika terjadi kesalahan saat coding atau sebelum melakukan commit.

### A. Membatalkan Perubahan File yang Belum di-Stage

```bash
# Mengembalikan satu file ke kondisi commit terakhir
git restore nama_file.php

# Mengembalikan seluruh perubahan file yang belum di-stage
git restore .
```

### B. Membatalkan File yang Sudah di-Stage

```bash
# Mengeluarkan satu file dari staging area
git restore --staged nama_file.php

# Mengeluarkan seluruh file dari staging area
git restore --staged .
```

### C. Membatalkan Commit Terakhir tetapi Mempertahankan Perubahan

```bash
git reset --soft HEAD~1
```

Perubahan dari commit terakhir tetap tersedia di staging area.

### D. Membatalkan Commit Terakhir dan Mengeluarkan Perubahan dari Staging

```bash
git reset HEAD~1
```

Perubahan tetap ada di file lokal, tetapi tidak lagi berada di staging area.

### E. Membatalkan Commit yang Sudah Terlanjur di-Push

```bash
git revert HEAD

git push
```

**Catatan:** `git revert` membuat commit baru yang membatalkan perubahan commit sebelumnya. Ini lebih aman untuk branch bersama dibandingkan mengubah riwayat menggunakan `reset`.

---

## 12. Mengatur File Menggunakan .gitignore

**Fungsi:** Mengabaikan file atau folder tertentu agar tidak ikut diunggah ke GitHub.

Contoh penggunaan `.gitignore` pada proyek Laravel:

```gitignore
# Environment dan konfigurasi sensitif
.env
.env.*
!.env.example

# Dependency
/vendor
/node_modules

# Cache dan hasil build
/public/build
/public/hot

# File log
/storage/logs/*.log

# File sistem
.DS_Store
Thumbs.db

# IDE dan editor
.idea/
.vscode/
```

### Jika File Sudah Terlanjur Masuk ke GitHub

```bash
# Hapus pelacakan file .env tanpa menghapus file lokal
git rm --cached .env

# Commit perubahan
git commit -m "chore: menghapus file environment dari repository"

# Push ke GitHub
git push
```

**Catatan penting untuk Laravel:**
- Jangan mengunggah `.env` karena berisi konfigurasi dan kredensial aplikasi.
- Tetap unggah `.env.example` sebagai contoh konfigurasi.
- Folder `vendor` dan `node_modules` tidak perlu diunggah.
- Jika kredensial sudah terlanjur terunggah, segera ganti kredensial yang bersangkutan. Menghapus file dari commit terbaru saja tidak menghapusnya dari riwayat Git.

---

## 13. Mengecek Repository & Riwayat Commit

**Fungsi:** Melihat kondisi repository, branch aktif, perubahan file, dan riwayat commit.

```bash
# Melihat status repository
git status

# Melihat branch aktif
git branch

# Melihat daftar remote
git remote -v

# Melihat riwayat commit
git log

# Melihat riwayat commit secara ringkas
git log --oneline

# Melihat riwayat commit beserta seluruh branch
git log --oneline --all --graph --decorate

# Melihat perbedaan perubahan file
git diff

# Melihat perubahan yang sudah masuk staging
git diff --staged
```

Perintah ini berguna untuk memastikan perubahan sebelum melakukan commit maupun push.

---

## 14. Mengganti Remote Repository

**Fungsi:** Digunakan ketika ingin menghubungkan proyek lokal ke repository GitHub yang berbeda atau memperbaiki URL remote yang salah.

### A. Mengubah URL Remote yang Sudah Ada

```bash
# Melihat remote saat ini
git remote -v

# Mengganti URL origin
git remote set-url origin https://github.com/USERNAME/REPOSITORY-BARU.git

# Memastikan perubahan
git remote -v

# Push ke repository baru
git push -u origin main
```

### B. Menghapus Remote Lama dan Menambahkan Remote Baru

```bash
# Menghapus remote origin
git remote remove origin

# Menambahkan remote baru
git remote add origin https://github.com/USERNAME/REPOSITORY-BARU.git

# Memeriksa remote
git remote -v

# Push ke repository baru
git push -u origin main
```

**Catatan:** Mengganti remote tidak otomatis menghapus repository lama di GitHub.

---

## 15. Force Push (Kondisi Darurat)

**Fungsi:** Menimpa riwayat branch di GitHub menggunakan riwayat lokal. Biasanya digunakan untuk kondisi khusus ketika riwayat commit perlu disesuaikan.

```bash
# Menimpa remote dengan pemeriksaan keamanan
git push --force-with-lease origin main
```

Alternatif yang lebih berisiko:

```bash
git push --force origin main
```

**PERINGATAN:**
- Force push dapat menghilangkan commit yang sudah ada di remote.
- Hindari penggunaan pada branch `main` yang digunakan bersama.
- Jangan gunakan hanya karena mengalami `push rejected`.
- Gunakan `--force-with-lease` daripada `--force` jika memang harus melakukan force push.
- Pastikan tidak ada pekerjaan anggota lain yang akan tertimpa.

---

## 📌 Rekomendasi Workflow Sehari-hari

Untuk mempermudah penggunaan, berikut rangkuman perintah yang paling sering digunakan.

### Proyek Pribadi (Main)

```bash
git pull
git status
git add -A
git commit -m "feat: deskripsi perubahan"
git push
```

### Proyek Kelompok (Feature Branch)

```bash
# Mulai dari main terbaru
git switch main
git pull origin main

# Buat branch pekerjaan
git switch -c fitur-baru

# Coding dan simpan perubahan
git add -A
git commit -m "feat: menambahkan fitur baru"

# Push branch
git push -u origin fitur-baru
```

Selanjutnya buat Pull Request di GitHub dan tunggu proses review sebelum melakukan merge ke `main`.

---

**Dokumentasi ini dibuat sebagai panduan referensi Git & GitHub untuk pengelolaan proyek pribadi maupun kolaborasi tim.**