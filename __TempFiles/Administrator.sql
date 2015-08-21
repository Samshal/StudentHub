Use [DATABASE_PLACEHOLDER]
GO

--- This Scripts Creates The
--- Necessary Tables in the
--- Administrators Schema Of The StudentHub
--- Database

-- CREATING THE Info TABLE

CREATE TABLE [Administrators].[Info]
(
	AdministratorID int IDENTITY(1, 1),
	FirstName VARCHAR(20), LastName VARCHAR(20),
	MiddleName VARCHAR(20), PhoneNumber VARCHAR(15),
	Email VARCHAR(30), HomeAddress VARCHAR(50), 
	DateOfBirth DATE, Country VARCHAR(20),
	State VARCHAR(20), Gender VARCHAR(7)
)
GO

-- CREATING THE Profile TABLE

CREATE TABLE [Administrators].[Profile]
(
	ProfileID int IDENTITY(1, 1),
	Administrator int,
	Picture VARCHAR(100), TagLine VARCHAR(140)
)
GO

CREATE TABLE [Administrators].[Note]
(
	NoteID int IDENTITY(1, 1),
	Administrator int,
	NoteTitle VARCHAR(50),
	NoteLocation VARCHAR(50)
)
GO

CREATE TABLE [Administrators].[Account]
(
	AccountID int IDENTITY(1, 1),
	Administrator int,
	Complete int,
	DateJoined datetime, DateModified datetime
)
GO