USE master
GO
---- The Batch statements Below
---- Creates a database called [DATABASE_PLACEHOLDER]
---- with a filestream filegroup called
---- [DATABASE_PLACEHOLDER]_FS_1 and a log file called
---- [DATABASE_PLACEHOLDER] log.
---- The database filegroups will be stored
---- in a folder called [DATABASE_PLACEHOLDER] on the c drive

---- START DATABASE CREATION

CREATE DATABASE [DATABASE_PLACEHOLDER]
--- The primary file group is been defined below
ON PRIMARY
	(
		NAME = '[DATABASE_PLACEHOLDER]_Primary',
		FILENAME = 'C:\[DATABASE_PLACEHOLDER]\[DATABASE_PLACEHOLDER]_PRM.mdf',
		SIZE = 4MB,
		MAXSIZE = 10MB,
		FILEGROWTH = 1MB
	),
---- The secondary filegroup which is a filestream is defined below
FILEGROUP [DATABASE_PLACEHOLDER] CONTAINS FILESTREAM
	(
		NAME = '[DATABASE_PLACEHOLDER]_FS',
		FILENAME = 'C:\[DATABASE_PLACEHOLDER]\[DATABASE_PLACEHOLDER]_FS.ndf'
	)
--- The Log file is defined below
LOG ON
	(
		NAME = '[DATABASE_PLACEHOLDER]_Log',
		FILENAME = 'C:\[DATABASE_PLACEHOLDER]\[DATABASE_PLACEHOLDER]_Log.ldf',
		SIZE = 1MB,
		MAXSIZE = 10MB,
		FILEGROWTH = 1MB
	)
--- END DATABASE CREATION
GO