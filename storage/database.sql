-- Keterangan:
-- Ubah fp_pbkk.dbo sesuai schema

-- Create a new table called 'users' in schema 'fp_pbkk.dbo'
-- Drop the table if it already exists
IF OBJECT_ID('fp_pbkk.dbo.users', 'U') IS NOT NULL
DROP TABLE fp_pbkk.dbo.users
GO
-- Create the table in the specified schema
CREATE TABLE fp_pbkk.dbo.users
(
    user_id [VARCHAR](36) NOT NULL PRIMARY KEY, -- primary key column
    username [VARCHAR](100) NOT NULL,
    email [VARCHAR](50) NOT NULL,
    password [VARCHAR](255) NOT NULL,
    hospital_id [INT],
    district_id [CHAR](10),
    pasien_id [VARCHAR](36),
    role [INT],
    identity_type [INT],
    identity_number [VARCHAR](64).
    name [VARCHAR](128),
    address [VARCHAR](256),
    sex [INT]

    -- specify more columns here
);
GO

-- Create a new table called 'announcements' in schema 'fp_pbkk.dbo'
-- Drop the table if it already exists
IF OBJECT_ID('fp_pbkk.dbo.announcements', 'U') IS NOT NULL
DROP TABLE fp_pbkk.dbo.announcements
GO
-- Create the table in the specified schema
CREATE TABLE fp_pbkk.dbo.announcements
(
    id [VARCHAR](36) NOT NULL PRIMARY KEY, -- primary key column
    title [VARCHAR](100) NOT NULL,
    content [VARCHAR](100) NOT NULL,
    [timestamp] [DATETIME] NOT NULL
);
GO

-- Create a new table called 'cek_kesehatans' in schema 'fp_pbkk.dbo'
-- Drop the table if it already exists
IF OBJECT_ID('fp_pbkk.dbo.cek_kesehatans', 'U') IS NOT NULL
DROP TABLE fp_pbkk.dbo.cek_kesehatans
GO
-- Create the table in the specified schema
CREATE TABLE fp_pbkk.dbo.cek_kesehatans
(
    id [VARCHAR](36) NOT NULL PRIMARY KEY, -- primary key column
    user_id [VARCHAR](36) NOT NULL,
    suhu_tubuh INT NOT NULL,
    frekuensi_napas INT NOT NULL,
    gejala_lain [VARCHAR](255),
    is_checked SMALLINT NOT NULL,
    hasil [VARCHAR](100),
    riwayat_perjalanan [VARCHAR](255),
    [timestamp] datetime
);
GO

-- Create a new table called 'provinces' in schema 'fp_pbkk.dbo'
-- Drop the table if it already exists
IF OBJECT_ID('fp_pbkk.dbo.provinces', 'U') IS NOT NULL
DROP TABLE fp_pbkk.dbo.provinces
GO
-- Create the table in the specified schema
CREATE TABLE fp_pbkk.dbo.provinces
(
    id [CHAR](2) NOT NULL PRIMARY KEY, -- primary key column
    name [VARCHAR](100) NOT NULL
);
GO

-- Create a new table called 'regencies' in schema 'fp_pbkk.dbo'
-- Drop the table if it already exists
IF OBJECT_ID('fp_pbkk.dbo.regencies', 'U') IS NOT NULL
DROP TABLE fp_pbkk.dbo.regencies
GO
-- Create the table in the specified schema
CREATE TABLE fp_pbkk.dbo.regencies
(
    id [char](4) NOT NULL PRIMARY KEY, -- primary key column
    province_id [CHAR](2) NOT NULL,
    name [VARCHAR](100) NOT NULL
);
GO

-- Create a new table called 'districts' in schema 'fp_pbkk.dbo'
-- Drop the table if it already exists
IF OBJECT_ID('fp_pbkk.dbo.districts', 'U') IS NOT NULL
DROP TABLE fp_pbkk.dbo.districts
GO
-- Create the table in the specified schema
CREATE TABLE fp_pbkk.dbo.districts
(
    id [CHAR](7) NOT NULL PRIMARY KEY, -- primary key column
    regency_id [CHAR](4) NOT NULL,
    name [VARCHAR](100) NOT NULL
);
GO

-- Create a new table called 'status_covid19' in schema 'fp_pbkk.dbo'
-- Drop the table if it already exists
IF OBJECT_ID('fp_pbkk.dbo.status_covid19', 'U') IS NOT NULL
DROP TABLE fp_pbkk.dbo.status_covid19
GO
-- Create the table in the specified schema
CREATE TABLE fp_pbkk.dbo.status_covid19
(
    id [VARCHAR](36) NOT NULL PRIMARY KEY, -- primary key column
    nama [VARCHAR](32) NOT NULL,
    deskripsi [VARCHAR](100)
);
GO

-- Create a new table called 'pasiens' in schema 'fp_pbkk.dbo'
-- Drop the table if it already exists
IF OBJECT_ID('fp_pbkk.dbo.pasiens', 'U') IS NOT NULL
DROP TABLE fp_pbkk.dbo.pasiens
GO
-- Create the table in the specified schema
CREATE TABLE fp_pbkk.dbo.pasiens
(
    id [VARCHAR](36) NOT NULL PRIMARY KEY, -- primary key column
    nama_lengkap [VARCHAR](100) NOT NULL,
    district_id [CHAR](7) NOT NULL,
    alamat [VARCHAR](100) NOT NULL,
    jenis_kelamin [CHAR](1) NOT NULL,
    tinggi_badan INT NOT NULL,
    berat_badan INT NOT NULL,
    tekanan_darah [VARCHAR](32) NOT NULL,
    jenis_penyakit [VARCHAR](100) NOT NULL,
    riwayat_perjalanan [VARCHAR](255),
    alergi [VARCHAR](100),
    status_id [VARCHAR](36) NOT NULL,
    [timestamp] DATETIME
    -- specify more columns here
);
GO