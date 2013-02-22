<?php

// autoload_classmap.php generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);

return array(
    'Base' => $baseDir . '/app/models/Base.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'CreatePageTable' => $baseDir . '/app/database/migrations/2013_02_15_104851_create_page_table.php',
    'CreateUsersTable' => $baseDir . '/app/database/migrations/2013_02_14_223237_create_users_table.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'Page' => $baseDir . '/app/models/Page.php',
    'Pheanstalk' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk.php',
    'Pheanstalk_ClassLoader' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/ClassLoader.php',
    'Pheanstalk_Command' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command.php',
    'Pheanstalk_Command_AbstractCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/AbstractCommand.php',
    'Pheanstalk_Command_BuryCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/BuryCommand.php',
    'Pheanstalk_Command_DeleteCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/DeleteCommand.php',
    'Pheanstalk_Command_IgnoreCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/IgnoreCommand.php',
    'Pheanstalk_Command_KickCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/KickCommand.php',
    'Pheanstalk_Command_ListTubeUsedCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/ListTubeUsedCommand.php',
    'Pheanstalk_Command_ListTubesCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/ListTubesCommand.php',
    'Pheanstalk_Command_ListTubesWatchedCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/ListTubesWatchedCommand.php',
    'Pheanstalk_Command_PauseTubeCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/PauseTubeCommand.php',
    'Pheanstalk_Command_PeekCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/PeekCommand.php',
    'Pheanstalk_Command_PutCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/PutCommand.php',
    'Pheanstalk_Command_ReleaseCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/ReleaseCommand.php',
    'Pheanstalk_Command_ReserveCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/ReserveCommand.php',
    'Pheanstalk_Command_StatsCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/StatsCommand.php',
    'Pheanstalk_Command_StatsJobCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/StatsJobCommand.php',
    'Pheanstalk_Command_StatsTubeCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/StatsTubeCommand.php',
    'Pheanstalk_Command_TouchCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/TouchCommand.php',
    'Pheanstalk_Command_UseCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/UseCommand.php',
    'Pheanstalk_Command_WatchCommand' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Command/WatchCommand.php',
    'Pheanstalk_Connection' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Connection.php',
    'Pheanstalk_Exception' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception.php',
    'Pheanstalk_Exception_ClientException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/ClientException.php',
    'Pheanstalk_Exception_CommandException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/CommandException.php',
    'Pheanstalk_Exception_ConnectionException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/ConnectionException.php',
    'Pheanstalk_Exception_ServerBadFormatException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/ServerBadFormatException.php',
    'Pheanstalk_Exception_ServerDrainingException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/ServerDrainingException.php',
    'Pheanstalk_Exception_ServerException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/ServerException.php',
    'Pheanstalk_Exception_ServerInternalErrorException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/ServerInternalErrorException.php',
    'Pheanstalk_Exception_ServerOutOfMemoryException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/ServerOutOfMemoryException.php',
    'Pheanstalk_Exception_ServerUnknownCommandException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/ServerUnknownCommandException.php',
    'Pheanstalk_Exception_SocketException' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Exception/SocketException.php',
    'Pheanstalk_Job' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Job.php',
    'Pheanstalk_Response' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Response.php',
    'Pheanstalk_ResponseParser' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/ResponseParser.php',
    'Pheanstalk_Response_ArrayResponse' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Response/ArrayResponse.php',
    'Pheanstalk_Socket' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Socket.php',
    'Pheanstalk_Socket_NativeSocket' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Socket/NativeSocket.php',
    'Pheanstalk_Socket_StreamFunctions' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Socket/StreamFunctions.php',
    'Pheanstalk_Socket_WriteHistory' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/Socket/WriteHistory.php',
    'Pheanstalk_YamlResponseParser' => $baseDir . '/vendor/laravel/framework/src/Illuminate/Queue/Pheanstalk/Pheanstalk/YamlResponseParser.php',
    'SessionHandlerInterface' => $baseDir . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'User' => $baseDir . '/app/models/User.php',
    'UserController' => $baseDir . '/app/controllers/UserController.php',
);
