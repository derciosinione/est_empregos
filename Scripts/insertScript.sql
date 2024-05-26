USE est_jobs;

INSERT INTO Profiles (Name, IsActive) VALUES ('Admin', true);
INSERT INTO Profiles (Name, IsActive) VALUES ('Gestor', true);
INSERT INTO Profiles (Name, IsActive) VALUES ('Empresa', true);

INSERT INTO CompanyStatus (Name, IsActive) VALUES ('Active', true);
INSERT INTO CompanyStatus (Name, IsActive) VALUES ('Inactive', true);
INSERT INTO CompanyStatus (Name, IsActive) VALUES ('Pending', true);

INSERT INTO Categories (Name, IsActive) VALUES ('IT', true);
INSERT INTO Categories (Name, IsActive) VALUES ('Engineering', true);
INSERT INTO Categories (Name, IsActive) VALUES ('Marketing', true);
INSERT INTO Categories (Name, IsActive) VALUES ('Sales', true);
INSERT INTO Categories (Name, IsActive) VALUES ('Customer Service', true);
INSERT INTO Categories (Name, IsActive) VALUES ('Finance', true);
INSERT INTO Categories (Name, IsActive) VALUES ('Human Resources', true);
INSERT INTO Categories (Name, IsActive) VALUES ('Operations', true);

INSERT INTO Users (Name, UserName, Email, PhoneNumber, AvatarUrl, BirthDay, PasswordHash, ProfileId, IsStaff, IsActive)
VALUES ('John Doe', 'johndoe', 'estemprego@gmail.com', '+1234567890', 'https://images.unsplash.com/photo-1558730234-d8b2281b0d00?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '1990-05-15', '12345', 1, true, true);

INSERT INTO Users (Name, UserName, Email, PhoneNumber, AvatarUrl, BirthDay, PasswordHash, ProfileId, IsStaff, IsActive)
VALUES ('Jane Smith', 'janesmith', 'janesmith@example.com', '+9876543210', 'https://images.unsplash.com/photo-1509650044681-18857a56c40b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '1985-09-22', '12345', 2, true, true);

INSERT INTO Users (Name, UserName, Email, PhoneNumber, AvatarUrl, BirthDay, PasswordHash, ProfileId, IsStaff, IsActive)
VALUES ('Alice Johnson', 'alicej', 'alice@example.com', '+1112223333', 'https://images.unsplash.com/photo-1506863530036-1efeddceb993?q=80&w=1944&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '1995-02-10', '12345', 3, false, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('ABC Corp', '123456789', '123 Main St', 1, 1, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('XYZ Inc', '987654321', '456 Oak St', 1, 2, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('Tech Solutions', '567890123', '789 Elm St', 1, 3, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('Global Ventures', '321098765', '321 Maple St', 2, 1, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('Marketing Pros', '456789012', '654 Pine St', 2, 2, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('Finance Experts', '789012345', '987 Cedar St', 2, 3, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('Innovate Co.', '234567890', '234 Birch St', 3, 1, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('Consulting Group', '890123456', '567 Walnut St', 3, 2, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('Logistics Solutions', '678901234', '890 Ash St', 3, 3, true);

INSERT INTO Companies (Name, Nif, Address, CompanyStatusId, UserId, IsActive)
VALUES ('Software Innovations', '456789012', '123 Pine St', 1, 1, true);



-- Inserir dados na tabela JobOffers
INSERT INTO JobOffers (Title, Description, CategoryId, CompanyId, LastEditionManagerId, IsActive, IsDeleted)
VALUES ('Software Developer', 'Develop and maintain software applications.', 1, 1, 1, true, false);

INSERT INTO JobOffers (Title, Description, CategoryId, CompanyId, LastEditionManagerId, IsActive, IsDeleted)
VALUES ('Project Manager', 'Manage projects and coordinate with teams.', 2, 2, 2, true, false);

INSERT INTO JobOffers (Title, Description, CategoryId, CompanyId, LastEditionManagerId, IsActive, IsDeleted)
VALUES ('Marketing Specialist', 'Plan and execute marketing campaigns.', 3, 3, 3, true, false);


-- Inserir dados na tabela JobOffersEditionHistory
INSERT INTO JobOffersEditionHistory (Title, Description, CategoryId, CompanyId, LastEditionManagerId, IsActive, IsDeleted)
VALUES ('Software Developer', 'Develop and maintain software applications.', 1, 1, 1, true, false);

INSERT INTO JobOffersEditionHistory (Title, Description, CategoryId, CompanyId, LastEditionManagerId, IsActive, IsDeleted)
VALUES ('Project Manager', 'Manage projects and coordinate with teams.', 2, 2, 2, true, false);

INSERT INTO JobOffersEditionHistory (Title, Description, CategoryId, CompanyId, LastEditionManagerId, IsActive, IsDeleted)
VALUES ('Marketing Specialist', 'Plan and execute marketing campaigns.', 3, 3, 3, true, false);

