CREATE DATABASE IF NOT EXISTS est_jobs;

USE est_jobs;


CREATE TABLE IF NOT EXISTS Profiles(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(20) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsStaff BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS Users (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    UserName VARCHAR(50) DEFAULT NULL,
    Nif varchar(20) UNIQUE DEFAULT NULL,
    Email VARCHAR(50) NOT NULL,
    PhoneNumber VARCHAR(20),
    AvatarUrl TEXT DEFAULT NULL,
    BirthDay DATE DEFAULT NULL,
    PasswordHash TEXT,
    ProfileId INT,
    IsStaff BOOL DEFAULT FALSE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (ProfileId) REFERENCES Profiles(Id) ON DELETE RESTRICT
);

-- alter table Users modify UserName varchar(50) unique;

-- alter table Users add Nif varchar(20) unique after UserName;

CREATE TABLE IF NOT EXISTS Categories(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(20) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    CreatorId INT,
    FOREIGN KEY (CreatorId) REFERENCES Users(Id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS CompanyStatus(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    CreatorId INT,
    FOREIGN KEY (CreatorId) REFERENCES Users(Id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS Companies(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(40),
    Nif VARCHAR(20),
    Address VARCHAR(20),
    CompanyStatusId Int,
    UserId INT,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (UserId) REFERENCES Users(Id) ON DELETE SET NULL,
    FOREIGN KEY (CompanyStatusId) REFERENCES CompanyStatus(Id) ON DELETE RESTRICT
);

-- Id: 2 unique
CREATE TABLE IF NOT EXISTS JobOffers(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(30),
    Description TEXT,
    CategoryId INT,
    CompanyId INT,
    LastEditionManagerId INT,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (CompanyId) REFERENCES Companies(Id) ON DELETE RESTRICT,
    FOREIGN KEY (LastEditionManagerId) REFERENCES Users(Id) ON DELETE SET NULL,
    FOREIGN KEY (CategoryId) REFERENCES Categories(Id) ON DELETE RESTRICT
);


CREATE TABLE IF NOT EXISTS JobOffersEditionHistory(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(30),
    Description TEXT,
    CategoryId INT,
    CompanyId INT,
    LastEditionManagerId INT,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW()
);