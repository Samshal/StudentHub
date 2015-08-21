Use [DATABASE_PLACEHOLDER]
GO

--- This Scripts Creates The
--- Necessary Tables in the
--- General Schema Of The [DATABASE_PLACEHOLDER]
--- Database

-- CREATING THE Semester TABLE

CREATE TABLE [General].[Semester]
(
	SemesterID int IDENTITY(1, 1),
	SemesterName VARCHAR(20),
	SemesterDuration int
)
GO

-- CREATING THE Course TABLE
CREATE TABLE [General].[Course]
(
	CourseID int IDENTITY(1, 1),
	CourseName VARCHAR(50),
	CourseDuration int,
	CourseDescription VARCHAR(140)
)
GO

--CREATING THE Subject TABLE

CREATE TABLE [General].[Subject]
(
	SubjectID int IDENTITY(1, 1),
	SubjectName VARCHAR(50),
	SubjectDescription VARCHAR(140)
)
GO

-- CREATING THE Relations TABLE

CREATE TABLE [General].[Relations]
(
	RelationsID int IDENTITY(1, 1),
	RelationDescription VARCHAR(50)
)
GO
