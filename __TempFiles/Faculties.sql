Use [DATABASE_PLACEHOLDER]
GO

--- This Scripts Creates The
--- Necessary Tables in the
--- Faculties Schema Of The [DATABASE_PLACEHOLDER]
--- Database

-- CREATING THE Info TABLE

CREATE TABLE [Faculties].[Info]
(
	FacultyID int IDENTITY(1, 1),
	FirstName VARCHAR(20), LastName VARCHAR(20),
	MiddleName VARCHAR(20), PhoneNumber VARCHAR(15),
	Email VARCHAR(30), HomeAddress VARCHAR(50), 
	DateOfBirth DATE, Country VARCHAR(20),
	State VARCHAR(20), Gender VARCHAR(7)
)
GO

-- CREATING THE Profile TABLE

CREATE TABLE [Faculties].[Profile]
(
	ProfileID int IDENTITY(1, 1),
	Faculty int,
	Picture VARCHAR(100), TagLine VARCHAR(140)
)
GO

-- CREATING THE Subject TABLE

CREATE TABLE [Faculties].[Subject]
(
	SubjectID int IDENTITY(1, 1),
	Faculty int, Course int,
	Semester int, Subject int
)
GO

CREATE TABLE [Faculties].[Note]
(
	NoteID int IDENTITY(1, 1),
	Faculty int,
	NoteTitle VARCHAR(50),
	NoteLocation VARCHAR(50)
)
GO

CREATE TABLE [Faculties].[Account]
(
	AccountID int IDENTITY(1, 1),
	Faculty int,
	Complete int,
	DateJoined datetime, DateModified datetime
)
GO