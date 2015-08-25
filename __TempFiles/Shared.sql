Use [DATABASE_PLACEHOLDER]
GO

--- This Scripts Creates The
--- Necessary Tables in the
--- Shared Schema Of The [DATABASE_PLACEHOLDER]
--- Database

-- CREATING THE Note TABLE

CREATE TABLE [Shared].[Note]
(
	NoteID int IDENTITY(1, 1),
	NoteFromType int, NoteToType int,
	NoteFrom int, NoteTo int
)
GO

--CREATING THE QuestionForum TABLE

CREATE TABLE [Shared].[QuestionForum]
(
	QuestionID int IDENTITY(1, 1),
	AskedBy int, Question VARCHAR(200)
)
GO

--CREATING THE AnswerForum TABLE

CREATE TABLE [Shared].[AnswerForum]
(
	AnswerID int IDENTITY(1, 1),
	Question int,
	AnsweredByType int, AnsweredBy int,
	Answer VARCHAR(500)
)
GO

-- CREATING THE Announcement TABLE

CREATE TABLE [Shared].[Announcement]
(
	AnnouncementID int IDENTITY(1, 1),
	AnnouncerFrom int, AnnouncerTo int,
	Announcer int, Announcement VARCHAR(150)
)
GO

-- CREATING THE Message Table
CREATE TABLE [Shared].[Message]
(
	MessageID int IDENTITY(1, 1),
	MessageFromType int, MessageToType int,
	MessageFrom int, MessageToArray VARCHAR(300),
	GUID VARCHAR(MAX)
)
GO

CREATE TABLE [Shared].[MessageContent]
(
	MessageContentID int IDENTITY(1, 1),
	Message int, Title VARCHAR(50),
	Content VARCHAR(140), 
	MessageDate datetime, Seen int
)
GO
