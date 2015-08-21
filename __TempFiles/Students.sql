Use [DATABASE_PLACEHOLDER]
GO

--- This Scripts Creates The
--- Necessary Tables in the
--- Students Schema Of The [DATABASE_PLACEHOLDER]
--- Database

-- CREATING THE Info TABLE

CREATE TABLE [Students].[Info]
(
	StudentID int IDENTITY(1, 1),
	FirstName VARCHAR(20), LastName VARCHAR(20),
	MiddleName VARCHAR(20), PhoneNumber VARCHAR(15),
	Email VARCHAR(30), HomeAddress VARCHAR(50), 
	DateOfBirth DATE, Country VARCHAR(20),
	State VARCHAR(20), Gender VARCHAR(7)
)
GO

-- CREATING THE Profile TABLE

CREATE TABLE [Students].[Profile]
(
	ProfileID int IDENTITY(1, 1),
	Student int, Picture VARCHAR(100),
	TagLine VARCHAR(140)
)
GO

-- CREATING THE Course TABLE

CREATE TABLE [Students].[Course]
(
	CourseID int IDENTITY(1, 1),
	Student int, Course int
)
GO

-- CREATING THE Semester TABLE

CREATE TABLE [Students].[Semester]
(
	SemesterID int IDENTITY(1, 1),
	Student int, Semester int
)
GO

--CREATING THE Note TABLE

CREATE TABLE [Students].[Note]
(
	NoteID int IDENTITY(1, 1),
	Student int,
	NoteTitle VARCHAR(50),
	NoteLocation VARCHAR(50)
)
GO

CREATE TABLE [Students].[Account]
(
	AccountID int IDENTITY(1, 1),
	Student int,
	Complete int,
	DateJoined datetime, DateModified datetime
)
GO