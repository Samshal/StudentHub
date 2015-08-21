Use [DATABASE_PLACEHOLDER]
GO

--- This Scripts Creates The
--- Necessary Tables in the
--- Auth Schema Of The [DATABASE_PLACEHOLDER]
--- Database

CREATE TABLE [Auth].[Student]
(
	LoginID int IDENTITY(1, 1),
	Student int, UserName VARCHAR(20),
	PassWord VARCHAR(500)
)
GO

CREATE TABLE [Auth].[Faculty]
(
	LoginID int IDENTITY(1, 1),
	Faculty int, UserName VARCHAR(20),
	PassWord VARCHAR(500)
)
GO

CREATE TABLE [Auth].[Administrator]
(
	LoginID int IDENTITY(1, 1),
	Administrator int, UserName VARCHAR(20),
	PassWord VARCHAR(500)
)
GO

CREATE TABLE [Auth].[LoginMeta]
(
	MetaID int IDENTITY(1, 1),
	UserType int, UserID int, LoginDate DATETIME,
	LogoutDate DATETIME, isLogin SMALLINT,
	BrowserDetail VARCHAR(50), DeviceDetail VARCHAR(50),
	LoginIP VARCHAR(50), LogoutReason VARCHAR(50)
)
GO