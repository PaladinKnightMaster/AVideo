<?php
// This file was auto-generated from sdk-root/src/data/route53-recovery-readiness/2019-12-02/docs-2.json
return [ 'version' => '2.0', 'service' => 'AWS Route53 Recovery Readiness', 'operations' => [ 'CreateCell' => 'Creates a new Cell.', 'CreateCrossAccountAuthorization' => 'Create a new cross account readiness authorization.', 'CreateReadinessCheck' => 'Creates a new Readiness Check.', 'CreateRecoveryGroup' => 'Creates a new Recovery Group.', 'CreateResourceSet' => 'Creates a new Resource Set.', 'DeleteCell' => 'Deletes an existing Cell.', 'DeleteCrossAccountAuthorization' => 'Delete cross account readiness authorization', 'DeleteReadinessCheck' => 'Deletes an existing Readiness Check.', 'DeleteRecoveryGroup' => 'Deletes an existing Recovery Group.', 'DeleteResourceSet' => 'Deletes an existing Resource Set.', 'GetArchitectureRecommendations' => 'Returns a collection of recommendations to improve resilliance and readiness check quality for a Recovery Group.', 'GetCell' => 'Returns information about a Cell.', 'GetCellReadinessSummary' => 'Returns information about readiness of a Cell.', 'GetReadinessCheck' => 'Returns information about a ReadinessCheck.', 'GetReadinessCheckResourceStatus' => 'Returns detailed information about the status of an individual resource within a Readiness Check\'s Resource Set.', 'GetReadinessCheckStatus' => 'Returns information about the status of a Readiness Check.', 'GetRecoveryGroup' => 'Returns information about a Recovery Group.', 'GetRecoveryGroupReadinessSummary' => 'Returns information about a Recovery Group.', 'GetResourceSet' => 'Returns information about a Resource Set.', 'ListCells' => 'Returns a collection of Cells.', 'ListCrossAccountAuthorizations' => 'Returns a collection of cross account readiness authorizations.', 'ListReadinessChecks' => 'Returns a collection of Readiness Checks.', 'ListRecoveryGroups' => 'Returns a collection of Recovery Groups.', 'ListResourceSets' => 'Returns a collection of Resource Sets.', 'ListRules' => 'Returns a collection of rules that are applied as part of Readiness Checks.', 'ListTagsForResources' => 'Returns a list of the tags assigned to the specified resource.', 'TagResource' => 'Adds tags to the specified resource. You can specify one or more tags to add.', 'UntagResource' => 'Removes tags from the specified resource. You can specify one or more tags to remove.', 'UpdateCell' => 'Updates an existing Cell.', 'UpdateReadinessCheck' => 'Updates an exisiting Readiness Check.', 'UpdateRecoveryGroup' => 'Updates an existing Recovery Group.', 'UpdateResourceSet' => 'Updates an existing Resource Set.', ], 'shapes' => [ 'CellCreateParameters' => [ 'base' => 'Parameters used to create a Cell', 'refs' => [], ], 'CellOutput' => [ 'base' => 'A Cell and its properties', 'refs' => [ '__listOfCellOutput$member' => NULL, ], ], 'CellUpdateParameters' => [ 'base' => 'Parameters used to update a Cell', 'refs' => [], ], 'CreateCrossAccountAuthorizationParameters' => [ 'base' => 'Parameters used to create a cross account authorization', 'refs' => [], ], 'CreateCrossAccountAuthorizationResult' => [ 'base' => 'The response for a CreateCrossAccountAuthorization operation.', 'refs' => [], ], 'CrossAccountAuthorization' => [ 'base' => 'A cross-account authorization, e.g. arn:aws:iam::123456789012:root', 'refs' => [ 'CreateCrossAccountAuthorizationParameters$CrossAccountAuthorization' => 'The cross account authorization', 'CreateCrossAccountAuthorizationResult$CrossAccountAuthorization' => 'The cross account authorization', '__listOfCrossAccountAuthorization$member' => NULL, ], ], 'DNSTargetResource' => [ 'base' => 'A component for DNS/Routing Control Readiness Checks', 'refs' => [ 'Resource$DnsTargetResource' => NULL, ], ], 'DeleteCrossAccountAuthorizationResult' => [ 'base' => 'The response for a DeleteCrossAccountAuthorization operation.', 'refs' => [], ], 'GetArchitectureRecommendationsOutput' => [ 'base' => 'Result from GetArchitectureRecommendations', 'refs' => [], ], 'GetCellReadinessSummaryOutput' => [ 'base' => 'Result of a GetReadinessCellSummary operation', 'refs' => [], ], 'GetReadinessCheckResourceStatusOutput' => [ 'base' => 'Result of a GetReadinessCheckResourceStatus operation', 'refs' => [], ], 'GetReadinessCheckStatusOutput' => [ 'base' => 'Result of a GetReadinessCheckStatus operation', 'refs' => [], ], 'GetRecoveryGroupReadinessSummaryOutput' => [ 'base' => 'Result of a GetReadinessRecoveryGroupSummary operation', 'refs' => [], ], 'LastAuditTimestamp' => [ 'base' => 'The time a Recovery Group was last assessed for recommendations in UTC ISO-8601 format', 'refs' => [ 'GetArchitectureRecommendationsOutput$LastAuditTimestamp' => 'The time a Recovery Group was last assessed for recommendations in UTC ISO-8601 format.', ], ], 'ListCellsResult' => [ 'base' => 'Response object for listCells', 'refs' => [], ], 'ListCrossAccountAuthorizationsResult' => [ 'base' => 'The response for a ListCrossAccountAuthorizations operation.', 'refs' => [], ], 'ListReadinessChecksResult' => [ 'base' => 'Response object for ListReadinessChecks', 'refs' => [], ], 'ListRecoveryGroupsResult' => [ 'base' => 'Response object for listRecoveryGroups', 'refs' => [], ], 'ListResourceSetsResult' => [ 'base' => 'Response object for listResourceSets', 'refs' => [], ], 'ListRulesOutput' => [ 'base' => 'A collection of rules used in a readiness check', 'refs' => [ '__listOfListRulesOutput$member' => NULL, ], ], 'ListRulesResult' => [ 'base' => 'Response object for List RulePacks', 'refs' => [], ], 'Message' => [ 'base' => 'Information relating to readiness check status', 'refs' => [ '__listOfMessage$member' => NULL, ], ], 'NLBResource' => [ 'base' => 'The NLB resource a DNS Target Resource points to', 'refs' => [ 'TargetResource$NLBResource' => NULL, ], ], 'R53ResourceRecord' => [ 'base' => 'The Route 53 resource a DNS Target Resource record points to', 'refs' => [ 'TargetResource$R53Resource' => NULL, ], ], 'Readiness' => [ 'base' => 'The readiness of an entire ReadinessCheck or an individual resource ARN.', 'refs' => [ 'GetCellReadinessSummaryOutput$Readiness' => 'The readiness at Cell level.', 'GetReadinessCheckResourceStatusOutput$Readiness' => 'The readiness at rule level.', 'GetReadinessCheckStatusOutput$Readiness' => 'The readiness at rule level.', 'GetRecoveryGroupReadinessSummaryOutput$Readiness' => 'The readiness at RecoveryGroup level.', 'ReadinessCheckSummary$Readiness' => 'The readiness of this ReadinessCheck', 'ResourceResult$Readiness' => 'The readiness of the resource.', 'RuleResult$Readiness' => 'The readiness at rule level.', ], ], 'ReadinessCheckCreateParameters' => [ 'base' => 'Parameters used to create or update a ReadinessCheck', 'refs' => [], ], 'ReadinessCheckOutput' => [ 'base' => 'A resource used for checking the readiness of a Resource Set', 'refs' => [ '__listOfReadinessCheckOutput$member' => NULL, ], ], 'ReadinessCheckSummary' => [ 'base' => 'Summary of ReadinessCheck status, paginated in GetRecoveryGroupReadinessSummary and GetCellReadinessSummary', 'refs' => [ '__listOfReadinessCheckSummary$member' => NULL, ], ], 'ReadinessCheckTimestamp' => [ 'base' => 'The time the Cell was last checked for readiness, in ISO-8601 format, UTC.', 'refs' => [ 'ResourceResult$LastCheckedTimestamp' => 'The time the resource was last checked for readiness, in ISO-8601 format, UTC.', 'RuleResult$LastCheckedTimestamp' => 'The time the resource was last checked for readiness, in ISO-8601 format, UTC.', ], ], 'ReadinessCheckUpdateParameters' => [ 'base' => 'Parameters used to create or update a ReadinessCheck', 'refs' => [], ], 'Recommendation' => [ 'base' => 'Guidance for improving Recovery Group resilliancy', 'refs' => [ '__listOfRecommendation$member' => NULL, ], ], 'RecoveryGroupCreateParameters' => [ 'base' => 'Parameters used to create an RecoveryGroup', 'refs' => [], ], 'RecoveryGroupOutput' => [ 'base' => 'A Recovery Group generally containing multiple Cells', 'refs' => [ '__listOfRecoveryGroupOutput$member' => NULL, ], ], 'RecoveryGroupUpdateParameters' => [ 'base' => 'Parameters used to update an RecoveryGroup', 'refs' => [], ], 'Resource' => [ 'base' => 'The resource element of a ResourceSet', 'refs' => [ '__listOfResource$member' => NULL, ], ], 'ResourceResult' => [ 'base' => 'Result with status for an individual resource.', 'refs' => [ '__listOfResourceResult$member' => NULL, ], ], 'ResourceSetCreateParameters' => [ 'base' => 'Parameters used to create a ResourceSet', 'refs' => [], ], 'ResourceSetOutput' => [ 'base' => 'A collection of resources of the same type', 'refs' => [ '__listOfResourceSetOutput$member' => NULL, ], ], 'ResourceSetUpdateParameters' => [ 'base' => 'Parameters used to create a ResourceSet', 'refs' => [], ], 'RuleResult' => [ 'base' => 'Result with status for an individual rule..', 'refs' => [ '__listOfRuleResult$member' => NULL, ], ], 'Tags' => [ 'base' => 'A collection of tags associated with a resource', 'refs' => [ 'CellCreateParameters$Tags' => NULL, 'CellOutput$Tags' => NULL, 'ReadinessCheckCreateParameters$Tags' => NULL, 'ReadinessCheckOutput$Tags' => NULL, 'RecoveryGroupCreateParameters$Tags' => NULL, 'RecoveryGroupOutput$Tags' => NULL, 'ResourceSetCreateParameters$Tags' => NULL, 'ResourceSetOutput$Tags' => NULL, 'TagsModel$Tags' => NULL, ], ], 'TagsModel' => [ 'base' => NULL, 'refs' => [], ], 'TargetResource' => [ 'base' => 'The target resource the R53 record points to', 'refs' => [ 'DNSTargetResource$TargetResource' => NULL, ], ], '__listOfCellOutput' => [ 'base' => NULL, 'refs' => [ 'ListCellsResult$Cells' => 'A list of Cells', ], ], '__listOfCrossAccountAuthorization' => [ 'base' => NULL, 'refs' => [ 'ListCrossAccountAuthorizationsResult$CrossAccountAuthorizations' => 'A list of CrossAccountAuthorizations', ], ], '__listOfListRulesOutput' => [ 'base' => NULL, 'refs' => [ 'ListRulesResult$Rules' => 'A list of rules', ], ], '__listOfMessage' => [ 'base' => NULL, 'refs' => [ 'GetReadinessCheckStatusOutput$Messages' => 'Top level messages for readiness check status', 'RuleResult$Messages' => 'Details about the resource\'s readiness', ], ], '__listOfReadinessCheckOutput' => [ 'base' => NULL, 'refs' => [ 'ListReadinessChecksResult$ReadinessChecks' => 'A list of ReadinessCheck associated with the account', ], ], '__listOfReadinessCheckSummary' => [ 'base' => NULL, 'refs' => [ 'GetCellReadinessSummaryOutput$ReadinessChecks' => 'Summaries for the ReadinessChecks making up the Cell', 'GetRecoveryGroupReadinessSummaryOutput$ReadinessChecks' => 'Summaries for the ReadinessChecks making up the RecoveryGroup', ], ], '__listOfRecommendation' => [ 'base' => NULL, 'refs' => [ 'GetArchitectureRecommendationsOutput$Recommendations' => 'A list of recommendations for the customer\'s application', ], ], '__listOfRecoveryGroupOutput' => [ 'base' => NULL, 'refs' => [ 'ListRecoveryGroupsResult$RecoveryGroups' => 'A list of RecoveryGroups', ], ], '__listOfResource' => [ 'base' => NULL, 'refs' => [ 'ResourceSetCreateParameters$Resources' => 'A list of Resource objects', 'ResourceSetOutput$Resources' => 'A list of Resource objects', 'ResourceSetUpdateParameters$Resources' => 'A list of Resource objects', ], ], '__listOfResourceResult' => [ 'base' => NULL, 'refs' => [ 'GetReadinessCheckStatusOutput$Resources' => 'Summary of resources\'s readiness', ], ], '__listOfResourceSetOutput' => [ 'base' => NULL, 'refs' => [ 'ListResourceSetsResult$ResourceSets' => 'A list of ResourceSets associated with the account', ], ], '__listOfRuleResult' => [ 'base' => NULL, 'refs' => [ 'GetReadinessCheckResourceStatusOutput$Rules' => 'Details of the rules\'s results', ], ], '__listOf__string' => [ 'base' => NULL, 'refs' => [ 'CellCreateParameters$Cells' => 'A list of Cell arns contained within this Cell (for use in nested Cells, e.g. regions within which AZs)', 'CellOutput$Cells' => 'A list of Cell arns', 'CellOutput$ParentReadinessScopes' => 'A list of Cell ARNs and/or RecoveryGroup ARNs', 'CellUpdateParameters$Cells' => 'A list of Cell arns, completely replaces previous list', 'RecoveryGroupCreateParameters$Cells' => 'A list of Cell arns', 'RecoveryGroupOutput$Cells' => 'A list of Cell arns', 'RecoveryGroupUpdateParameters$Cells' => 'A list of Cell arns, completely replaces previous list', 'Resource$ReadinessScopes' => 'A list of RecoveryGroup ARNs and/or Cell ARNs that this resource is contained within.', ], ], '__string' => [ 'base' => NULL, 'refs' => [ 'CellCreateParameters$CellName' => 'The name of the Cell to create', 'DNSTargetResource$DomainName' => 'The DNS Name that acts as ingress point to a portion of application', 'DNSTargetResource$HostedZoneArn' => 'The Hosted Zone ARN that contains the DNS record with the provided name of target resource.', 'DNSTargetResource$RecordSetId' => 'The R53 Set Id to uniquely identify a record given a Name and a Type', 'DNSTargetResource$RecordType' => 'The Type of DNS Record of target resource', 'GetArchitectureRecommendationsOutput$NextToken' => 'A token that can be used to resume pagination from the end of the collection', 'GetCellReadinessSummaryOutput$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'GetReadinessCheckResourceStatusOutput$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'GetReadinessCheckStatusOutput$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'GetRecoveryGroupReadinessSummaryOutput$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'ListCellsResult$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'ListCrossAccountAuthorizationsResult$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'ListReadinessChecksResult$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'ListRecoveryGroupsResult$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'ListResourceSetsResult$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'ListRulesResult$NextToken' => 'A token that can be used to resume pagination from the end of the collection.', 'Message$MessageText' => 'The text of a readiness check message', 'NLBResource$Arn' => 'An NLB resource arn', 'R53ResourceRecord$DomainName' => 'The DNS target name', 'R53ResourceRecord$RecordSetId' => 'The Resource Record set id', 'ReadinessCheckCreateParameters$ReadinessCheckName' => 'The name of the ReadinessCheck to create', 'ReadinessCheckCreateParameters$ResourceSetName' => 'The name of the ResourceSet to check', 'ReadinessCheckSummary$ReadinessCheckName' => 'The name of a ReadinessCheck which is part of the given RecoveryGroup or Cell', 'ReadinessCheckUpdateParameters$ResourceSetName' => 'The name of the ResourceSet to check', 'Recommendation$RecommendationText' => 'Guidance text for recommendation', 'RecoveryGroupCreateParameters$RecoveryGroupName' => 'The name of the RecoveryGroup to create', 'Resource$ComponentId' => 'The component id of the resource, generated by the service when dnsTargetResource is used', 'Resource$ResourceArn' => 'The ARN of the AWS resource, can be skipped if dnsTargetResource is used', 'ResourceResult$ComponentId' => 'The component id of the resource', 'ResourceResult$ResourceArn' => 'The ARN of the resource', 'ResourceSetCreateParameters$ResourceSetName' => 'The name of the ResourceSet to create', 'RuleResult$RuleId' => 'The identifier of the rule.', 'Tags$member' => NULL, '__listOf__string$member' => NULL, ], ], '__stringMax256' => [ 'base' => NULL, 'refs' => [ 'CellOutput$CellArn' => 'The arn for the Cell', 'ListRulesOutput$RuleDescription' => 'A description of the rule', 'ReadinessCheckOutput$ReadinessCheckArn' => 'Arn associated with ReadinessCheck', 'RecoveryGroupOutput$RecoveryGroupArn' => 'The arn for the RecoveryGroup', 'ResourceSetOutput$ResourceSetArn' => 'The arn for the ResourceSet', ], ], '__stringMax64' => [ 'base' => NULL, 'refs' => [ 'ListRulesOutput$ResourceType' => 'The resource type the rule applies to.', 'ListRulesOutput$RuleId' => 'The Rule\'s ID.', ], ], '__stringMax64PatternAAZAZ09Z' => [ 'base' => NULL, 'refs' => [ 'CellOutput$CellName' => 'The name of the Cell', 'ReadinessCheckOutput$ReadinessCheckName' => 'Name for a ReadinessCheck', 'ReadinessCheckOutput$ResourceSet' => 'Name of the ResourceSet to be checked', 'RecoveryGroupOutput$RecoveryGroupName' => 'The name of the RecoveryGroup', 'ResourceSetOutput$ResourceSetName' => 'The name of the ResourceSet', ], ], '__stringPatternAWSAZaZ09AZaZ09' => [ 'base' => NULL, 'refs' => [ 'ResourceSetCreateParameters$ResourceSetType' => 'AWS Resource type of the resources in the ResourceSet', 'ResourceSetOutput$ResourceSetType' => 'AWS Resource Type of the resources in the ResourceSet', 'ResourceSetUpdateParameters$ResourceSetType' => 'AWS Resource Type of the resources in the ResourceSet', ], ], ],];
