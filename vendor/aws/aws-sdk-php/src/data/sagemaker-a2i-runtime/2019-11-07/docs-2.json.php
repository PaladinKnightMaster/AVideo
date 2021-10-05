<?php
// This file was auto-generated from sdk-root/src/data/sagemaker-a2i-runtime/2019-11-07/docs-2.json
return [ 'version' => '2.0', 'service' => '<p>Amazon Augmented AI (Amazon A2I) adds the benefit of human judgment to any machine learning application. When an AI application can\'t evaluate data with a high degree of confidence, human reviewers can take over. This human review is called a human review workflow. To create and start a human review workflow, you need three resources: a <i>worker task template</i>, a <i>flow definition</i>, and a <i>human loop</i>.</p> <p>For information about these resources and prerequisites for using Amazon A2I, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/a2i-getting-started.html">Get Started with Amazon Augmented AI</a> in the Amazon SageMaker Developer Guide.</p> <p>This API reference includes information about API actions and data types that you can use to interact with Amazon A2I programmatically. Use this guide to:</p> <ul> <li> <p>Start a human loop with the <code>StartHumanLoop</code> operation when using Amazon A2I with a <i>custom task type</i>. To learn more about the difference between custom and built-in task types, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/a2i-task-types-general.html">Use Task Types </a>. To learn how to start a human loop using this API, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/a2i-start-human-loop.html#a2i-instructions-starthumanloop">Create and Start a Human Loop for a Custom Task Type </a> in the Amazon SageMaker Developer Guide.</p> </li> <li> <p>Manage your human loops. You can list all human loops that you have created, describe individual human loops, and stop and delete human loops. To learn more, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/a2i-monitor-humanloop-results.html">Monitor and Manage Your Human Loop </a> in the Amazon SageMaker Developer Guide.</p> </li> </ul> <p>Amazon A2I integrates APIs from various AWS services to create and start human review workflows for those services. To learn how Amazon A2I uses these APIs, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/a2i-api-references.html">Use APIs in Amazon A2I</a> in the Amazon SageMaker Developer Guide.</p>', 'operations' => [ 'DeleteHumanLoop' => '<p>Deletes the specified human loop for a flow definition.</p> <p>If the human loop was deleted, this operation will return a <code>ResourceNotFoundException</code>. </p>', 'DescribeHumanLoop' => '<p>Returns information about the specified human loop. If the human loop was deleted, this operation will return a <code>ResourceNotFoundException</code> error. </p>', 'ListHumanLoops' => '<p>Returns information about human loops, given the specified parameters. If a human loop was deleted, it will not be included.</p>', 'StartHumanLoop' => '<p>Starts a human loop, provided that at least one activation condition is met.</p>', 'StopHumanLoop' => '<p>Stops the specified human loop.</p>', ], 'shapes' => [ 'ConflictException' => [ 'base' => '<p>Your request has the same name as another active human loop but has different input data. You cannot start two human loops with the same name and different input data.</p>', 'refs' => [], ], 'ContentClassifier' => [ 'base' => NULL, 'refs' => [ 'ContentClassifiers$member' => NULL, ], ], 'ContentClassifiers' => [ 'base' => NULL, 'refs' => [ 'HumanLoopDataAttributes$ContentClassifiers' => '<p>Declares that your content is free of personally identifiable information or adult content.</p> <p>Amazon SageMaker can restrict the Amazon Mechanical Turk workers who can view your task based on this information.</p>', ], ], 'DeleteHumanLoopRequest' => [ 'base' => NULL, 'refs' => [], ], 'DeleteHumanLoopResponse' => [ 'base' => NULL, 'refs' => [], ], 'DescribeHumanLoopRequest' => [ 'base' => NULL, 'refs' => [], ], 'DescribeHumanLoopResponse' => [ 'base' => NULL, 'refs' => [], ], 'FailureReason' => [ 'base' => NULL, 'refs' => [ 'ConflictException$Message' => NULL, 'HumanLoopSummary$FailureReason' => '<p>The reason why the human loop failed. A failure reason is returned when the status of the human loop is <code>Failed</code>.</p>', 'InternalServerException$Message' => NULL, 'ResourceNotFoundException$Message' => NULL, 'ServiceQuotaExceededException$Message' => NULL, 'ThrottlingException$Message' => NULL, 'ValidationException$Message' => NULL, ], ], 'FlowDefinitionArn' => [ 'base' => NULL, 'refs' => [ 'DescribeHumanLoopResponse$FlowDefinitionArn' => '<p>The Amazon Resource Name (ARN) of the flow definition.</p>', 'HumanLoopSummary$FlowDefinitionArn' => '<p>The Amazon Resource Name (ARN) of the flow definition used to configure the human loop.</p>', 'ListHumanLoopsRequest$FlowDefinitionArn' => '<p>The Amazon Resource Name (ARN) of a flow definition.</p>', 'StartHumanLoopRequest$FlowDefinitionArn' => '<p>The Amazon Resource Name (ARN) of the flow definition associated with this human loop.</p>', ], ], 'HumanLoopArn' => [ 'base' => NULL, 'refs' => [ 'DescribeHumanLoopResponse$HumanLoopArn' => '<p>The Amazon Resource Name (ARN) of the human loop.</p>', 'StartHumanLoopResponse$HumanLoopArn' => '<p>The Amazon Resource Name (ARN) of the human loop.</p>', ], ], 'HumanLoopDataAttributes' => [ 'base' => '<p>Attributes of the data specified by the customer. Use these to describe the data to be labeled.</p>', 'refs' => [ 'StartHumanLoopRequest$DataAttributes' => '<p>Attributes of the specified data. Use <code>DataAttributes</code> to specify if your data is free of personally identifiable information and/or free of adult content.</p>', ], ], 'HumanLoopInput' => [ 'base' => '<p>An object containing the human loop input in JSON format.</p>', 'refs' => [ 'StartHumanLoopRequest$HumanLoopInput' => '<p>An object that contains information about the human loop.</p>', ], ], 'HumanLoopName' => [ 'base' => NULL, 'refs' => [ 'DeleteHumanLoopRequest$HumanLoopName' => '<p>The name of the human loop that you want to delete.</p>', 'DescribeHumanLoopRequest$HumanLoopName' => '<p>The name of the human loop that you want information about.</p>', 'DescribeHumanLoopResponse$HumanLoopName' => '<p>The name of the human loop. The name must be lowercase, unique within the Region in your account, and can have up to 63 characters. Valid characters: a-z, 0-9, and - (hyphen).</p>', 'HumanLoopSummary$HumanLoopName' => '<p>The name of the human loop.</p>', 'StartHumanLoopRequest$HumanLoopName' => '<p>The name of the human loop.</p>', 'StopHumanLoopRequest$HumanLoopName' => '<p>The name of the human loop that you want to stop.</p>', ], ], 'HumanLoopOutput' => [ 'base' => '<p>Information about where the human output will be stored.</p>', 'refs' => [ 'DescribeHumanLoopResponse$HumanLoopOutput' => '<p>An object that contains information about the output of the human loop.</p>', ], ], 'HumanLoopStatus' => [ 'base' => NULL, 'refs' => [ 'DescribeHumanLoopResponse$HumanLoopStatus' => '<p>The status of the human loop. </p>', 'HumanLoopSummary$HumanLoopStatus' => '<p>The status of the human loop. </p>', ], ], 'HumanLoopSummaries' => [ 'base' => NULL, 'refs' => [ 'ListHumanLoopsResponse$HumanLoopSummaries' => '<p>An array of objects that contain information about the human loops.</p>', ], ], 'HumanLoopSummary' => [ 'base' => '<p>Summary information about the human loop.</p>', 'refs' => [ 'HumanLoopSummaries$member' => NULL, ], ], 'InputContent' => [ 'base' => NULL, 'refs' => [ 'HumanLoopInput$InputContent' => '<p>Serialized input from the human loop. The input must be a string representation of a file in JSON format.</p>', ], ], 'InternalServerException' => [ 'base' => '<p>We couldn\'t process your request because of an issue with the server. Try again later.</p>', 'refs' => [], ], 'ListHumanLoopsRequest' => [ 'base' => NULL, 'refs' => [], ], 'ListHumanLoopsResponse' => [ 'base' => NULL, 'refs' => [], ], 'MaxResults' => [ 'base' => NULL, 'refs' => [ 'ListHumanLoopsRequest$MaxResults' => '<p>The total number of items to return. If the total number of available items is more than the value specified in <code>MaxResults</code>, then a <code>NextToken</code> is returned in the output. You can use this token to display the next page of results. </p>', ], ], 'NextToken' => [ 'base' => NULL, 'refs' => [ 'ListHumanLoopsRequest$NextToken' => '<p>A token to display the next page of results.</p>', 'ListHumanLoopsResponse$NextToken' => '<p>A token to display the next page of results.</p>', ], ], 'ResourceNotFoundException' => [ 'base' => '<p>We couldn\'t find the requested resource. Check that your resources exists and were created in the same AWS Region as your request, and try your request again. </p>', 'refs' => [], ], 'ServiceQuotaExceededException' => [ 'base' => '<p>You exceeded your service quota. Service quotas, also referred to as limits, are the maximum number of service resources or operations for your AWS account. For a list of Amazon A2I service quotes, see <a href="https://docs.aws.amazon.com/general/latest/gr/a2i.html">Amazon Augmented AI Service Quotes</a>. Delete some resources or request an increase in your service quota. You can request a quota increase using Service Quotas or the AWS Support Center. To request an increase, see <a href="https://docs.aws.amazon.com/general/latest/gr/aws_service_limits.html">AWS Service Quotas</a> in the <i>AWS General Reference</i>.</p>', 'refs' => [], ], 'SortOrder' => [ 'base' => NULL, 'refs' => [ 'ListHumanLoopsRequest$SortOrder' => '<p>Optional. The order for displaying results. Valid values: <code>Ascending</code> and <code>Descending</code>.</p>', ], ], 'StartHumanLoopRequest' => [ 'base' => NULL, 'refs' => [], ], 'StartHumanLoopResponse' => [ 'base' => NULL, 'refs' => [], ], 'StopHumanLoopRequest' => [ 'base' => NULL, 'refs' => [], ], 'StopHumanLoopResponse' => [ 'base' => NULL, 'refs' => [], ], 'String' => [ 'base' => NULL, 'refs' => [ 'DescribeHumanLoopResponse$FailureReason' => '<p>The reason why a human loop failed. The failure reason is returned when the status of the human loop is <code>Failed</code>.</p>', 'DescribeHumanLoopResponse$FailureCode' => '<p>A failure code that identifies the type of failure.</p> <p>Possible values: <code>ValidationError</code>, <code>Expired</code>, <code>InternalError</code> </p>', 'HumanLoopOutput$OutputS3Uri' => '<p>The location of the Amazon S3 object where Amazon Augmented AI stores your human loop output.</p>', ], ], 'ThrottlingException' => [ 'base' => '<p>You exceeded the maximum number of requests.</p>', 'refs' => [], ], 'Timestamp' => [ 'base' => NULL, 'refs' => [ 'DescribeHumanLoopResponse$CreationTime' => '<p>The creation time when Amazon Augmented AI created the human loop.</p>', 'HumanLoopSummary$CreationTime' => '<p>When Amazon Augmented AI created the human loop.</p>', 'ListHumanLoopsRequest$CreationTimeAfter' => '<p>(Optional) The timestamp of the date when you want the human loops to begin in ISO 8601 format. For example, <code>2020-02-24</code>.</p>', 'ListHumanLoopsRequest$CreationTimeBefore' => '<p>(Optional) The timestamp of the date before which you want the human loops to begin in ISO 8601 format. For example, <code>2020-02-24</code>.</p>', ], ], 'ValidationException' => [ 'base' => '<p>The request isn\'t valid. Check the syntax and try again.</p>', 'refs' => [], ], ],];
