var search_data = {
    'index': {
        'searchIndex': ["workflux","workflux\\builder","workflux\\error","workflux\\guard","workflux\\parser","workflux\\parser\\xml","workflux\\renderer","workflux\\state","workflux\\statemachine","workflux\\transition","workflux\\builder\\statemachinebuilder","workflux\\builder\\statemachinebuilderinterface","workflux\\builder\\statesverification","workflux\\builder\\transitionsverification","workflux\\builder\\verificationinterface","workflux\\builder\\xmlstatemachinebuilder","workflux\\error\\error","workflux\\error\\verificationerror","workflux\\executioncontext","workflux\\executioncontextinterface","workflux\\guard\\callbackguard","workflux\\guard\\configurableguard","workflux\\guard\\expressionguard","workflux\\guard\\guardinterface","workflux\\guard\\variableguard","workflux\\parser\\parserinterface","workflux\\parser\\xml\\abstractxmlparser","workflux\\parser\\xml\\optionsxpathparser","workflux\\parser\\xml\\statemachinedefinitionparser","workflux\\parser\\xml\\xpath","workflux\\renderer\\abstractrenderer","workflux\\renderer\\dotgraphrenderer","workflux\\renderer\\graphrendererinterface","workflux\\statemachine\\statemachine","workflux\\statemachine\\statemachineinterface","workflux\\state\\state","workflux\\state\\stateinterface","workflux\\state\\variablestate","workflux\\statefulsubjectinterface","workflux\\transition\\transition","workflux\\transition\\transitioninterface","workflux\\builder\\statemachinebuilder::__construct","workflux\\builder\\statemachinebuilder::setstatemachinename","workflux\\builder\\statemachinebuilder::addstate","workflux\\builder\\statemachinebuilder::addstates","workflux\\builder\\statemachinebuilder::addtransition","workflux\\builder\\statemachinebuilder::addtransitions","workflux\\builder\\statemachinebuilder::build","workflux\\builder\\statemachinebuilderinterface::setstatemachinename","workflux\\builder\\statemachinebuilderinterface::addstate","workflux\\builder\\statemachinebuilderinterface::addstates","workflux\\builder\\statemachinebuilderinterface::addtransition","workflux\\builder\\statemachinebuilderinterface::addtransitions","workflux\\builder\\statemachinebuilderinterface::build","workflux\\builder\\statesverification::__construct","workflux\\builder\\statesverification::verify","workflux\\builder\\transitionsverification::__construct","workflux\\builder\\transitionsverification::verify","workflux\\builder\\verificationinterface::verify","workflux\\builder\\xmlstatemachinebuilder::build","workflux\\executioncontext::__construct","workflux\\executioncontext::getstatemachinename","workflux\\executioncontext::getcurrentstatename","workflux\\executioncontext::onstateentry","workflux\\executioncontext::onstateexit","workflux\\executioncontextinterface::getstatemachinename","workflux\\executioncontextinterface::getcurrentstatename","workflux\\executioncontextinterface::hasparameter","workflux\\executioncontextinterface::getparameter","workflux\\executioncontextinterface::getparameters","workflux\\executioncontextinterface::setparameter","workflux\\executioncontextinterface::removeparameter","workflux\\executioncontextinterface::clearparameters","workflux\\executioncontextinterface::setparameters","workflux\\executioncontextinterface::onstateentry","workflux\\executioncontextinterface::onstateexit","workflux\\guard\\callbackguard::__construct","workflux\\guard\\callbackguard::accept","workflux\\guard\\callbackguard::__tostring","workflux\\guard\\configurableguard::__construct","workflux\\guard\\expressionguard::__construct","workflux\\guard\\expressionguard::accept","workflux\\guard\\expressionguard::__tostring","workflux\\guard\\guardinterface::accept","workflux\\guard\\guardinterface::__tostring","workflux\\guard\\variableguard::accept","workflux\\parser\\parserinterface::parse","workflux\\parser\\xml\\abstractxmlparser::__construct","workflux\\parser\\xml\\abstractxmlparser::parse","workflux\\parser\\xml\\optionsxpathparser::__construct","workflux\\parser\\xml\\optionsxpathparser::literalize","workflux\\parser\\xml\\optionsxpathparser::literalizestring","workflux\\parser\\xml\\optionsxpathparser::parse","workflux\\parser\\xml\\xpath::__construct","workflux\\parser\\xml\\xpath::query","workflux\\renderer\\abstractrenderer::__construct","workflux\\renderer\\dotgraphrenderer::rendergraph","workflux\\renderer\\graphrendererinterface::rendergraph","workflux\\statemachine\\statemachine::__construct","workflux\\statemachine\\statemachine::getname","workflux\\statemachine\\statemachine::getinitialstate","workflux\\statemachine\\statemachine::getfinalstates","workflux\\statemachine\\statemachine::geteventstates","workflux\\statemachine\\statemachine::iseventstate","workflux\\statemachine\\statemachine::execute","workflux\\statemachine\\statemachine::getstates","workflux\\statemachine\\statemachine::getstate","workflux\\statemachine\\statemachine::gettransitions","workflux\\statemachine\\statemachineinterface::getname","workflux\\statemachine\\statemachineinterface::execute","workflux\\statemachine\\statemachineinterface::getinitialstate","workflux\\statemachine\\statemachineinterface::getfinalstates","workflux\\statemachine\\statemachineinterface::geteventstates","workflux\\statemachine\\statemachineinterface::getstates","workflux\\statemachine\\statemachineinterface::getstate","workflux\\statemachine\\statemachineinterface::iseventstate","workflux\\statemachine\\statemachineinterface::gettransitions","workflux\\state\\state::__construct","workflux\\state\\state::getname","workflux\\state\\state::gettype","workflux\\state\\state::isinitial","workflux\\state\\state::isactive","workflux\\state\\state::isfinal","workflux\\state\\state::onentry","workflux\\state\\state::onexit","workflux\\state\\stateinterface::getname","workflux\\state\\stateinterface::gettype","workflux\\state\\stateinterface::isinitial","workflux\\state\\stateinterface::isactive","workflux\\state\\stateinterface::isfinal","workflux\\state\\stateinterface::onentry","workflux\\state\\stateinterface::onexit","workflux\\state\\variablestate::onentry","workflux\\state\\variablestate::onexit","workflux\\statefulsubjectinterface::getexecutioncontext","workflux\\transition\\transition::__construct","workflux\\transition\\transition::getincomingstatenames","workflux\\transition\\transition::getoutgoingstatename","workflux\\transition\\transition::getguard","workflux\\transition\\transition::hasguard","workflux\\transition\\transitioninterface::getincomingstatenames","workflux\\transition\\transitioninterface::getoutgoingstatename","workflux\\transition\\transitioninterface::getguard","workflux\\transition\\transitioninterface::hasguard"],
        'info': [["Workflux","","Workflux.html","","",3],["Workflux\\Builder","","Workflux\/Builder.html","","",3],["Workflux\\Error","","Workflux\/Error.html","","",3],["Workflux\\Guard","","Workflux\/Guard.html","","",3],["Workflux\\Parser","","Workflux\/Parser.html","","",3],["Workflux\\Parser\\Xml","","Workflux\/Parser\/Xml.html","","",3],["Workflux\\Renderer","","Workflux\/Renderer.html","","",3],["Workflux\\State","","Workflux\/State.html","","",3],["Workflux\\StateMachine","","Workflux\/StateMachine.html","","",3],["Workflux\\Transition","","Workflux\/Transition.html","","",3],["StateMachineBuilder","Workflux\\Builder","Workflux\/Builder\/StateMachineBuilder.html","","The StateMachineBuilder provides a fluent api for defining",1],["StateMachineBuilderInterface","Workflux\\Builder","Workflux\/Builder\/StateMachineBuilderInterface.html","","StateMachineBuilderInterface implementations are supposed",1],["StatesVerification","Workflux\\Builder","Workflux\/Builder\/StatesVerification.html","","The StatesVerification is responsable for verifying",1],["TransitionsVerification","Workflux\\Builder","Workflux\/Builder\/TransitionsVerification.html","","The TransitionsVerification is responsable for making",1],["VerificationInterface","Workflux\\Builder","Workflux\/Builder\/VerificationInterface.html","","VerificationInterface implementations are supposed",1],["XmlStateMachineBuilder","Workflux\\Builder","Workflux\/Builder\/XmlStateMachineBuilder.html"," < StateMachineBuilder","The XmlStateMachineBuilder can build\/load a state_machine",1],["Error","Workflux\\Error","Workflux\/Error\/Error.html"," < Exception","Base class that all workflux errors\/exceptions should",1],["VerificationError","Workflux\\Error","Workflux\/Error\/VerificationError.html"," < Error","Represents an error in the context of verifying an",1],["ExecutionContext","Workflux","Workflux\/ExecutionContext.html","","Standard implementation of the ExecutionContextInterface.",1],["ExecutionContextInterface","Workflux","Workflux\/ExecutionContextInterface.html","","ExecutionContextInterface reflects the current state",1],["CallbackGuard","Workflux\\Guard","Workflux\/Guard\/CallbackGuard.html","","The CallbackGuard employs it's verification strategy",1],["ConfigurableGuard","Workflux\\Guard","Workflux\/Guard\/ConfigurableGuard.html","","The ConfigurableGuard is a base class that allows you",1],["ExpressionGuard","Workflux\\Guard","Workflux\/Guard\/ExpressionGuard.html"," < ConfigurableGuard","The ExpressionGuard employs it's verfification based",1],["GuardInterface","Workflux\\Guard","Workflux\/Guard\/GuardInterface.html","","GuardInterface implementations are supposed to check,",1],["VariableGuard","Workflux\\Guard","Workflux\/Guard\/VariableGuard.html"," < ExpressionGuard","The VariableGuard employs it's verfification based",1],["ParserInterface","Workflux\\Parser","Workflux\/Parser\/ParserInterface.html","","ParserInterface implementations are supposed to parse",1],["AbstractXmlParser","Workflux\\Parser\\Xml","Workflux\/Parser\/Xml\/AbstractXmlParser.html","","The AbstsractXmlParser serves as base class for xml",1],["OptionsXpathParser","Workflux\\Parser\\Xml","Workflux\/Parser\/Xml\/OptionsXpathParser.html","","The OptionsXpathParser can parse 'options' that are",1],["StateMachineDefinitionParser","Workflux\\Parser\\Xml","Workflux\/Parser\/Xml\/StateMachineDefinitionParser.html"," < AbstractXmlParser","The StateMachineDefinitionParser can parse xml state",1],["Xpath","Workflux\\Parser\\Xml","Workflux\/Parser\/Xml\/Xpath.html"," < DOMXpath","The Xpath class is a conveniece wrapper around DOMXpath",1],["AbstractRenderer","Workflux\\Renderer","Workflux\/Renderer\/AbstractRenderer.html","","The AbstractRenderer is a base class, that allows you",1],["DotGraphRenderer","Workflux\\Renderer","Workflux\/Renderer\/DotGraphRenderer.html"," < AbstractRenderer","The DotGraphRenderer can render state machines as dot-graphs.",1],["GraphRendererInterface","Workflux\\Renderer","Workflux\/Renderer\/GraphRendererInterface.html","","GraphRendererInterface implementations are expected",1],["StateMachine","Workflux\\StateMachine","Workflux\/StateMachine\/StateMachine.html","","",1],["StateMachineInterface","Workflux\\StateMachine","Workflux\/StateMachine\/StateMachineInterface.html","","StateMachineInterface implementations are expected",1],["State","Workflux\\State","Workflux\/State\/State.html","","The State class is a standard implementation of the",1],["StateInterface","Workflux\\State","Workflux\/State\/StateInterface.html","","StateInterface implementations are expected to act",1],["VariableState","Workflux\\State","Workflux\/State\/VariableState.html"," < State","The VariableState class set and removes variables when",1],["StatefulSubjectInterface","Workflux","Workflux\/StatefulSubjectInterface.html","","StatefulSubjectInterface provides the main contract",1],["Transition","Workflux\\Transition","Workflux\/Transition\/Transition.html","","Standard implementation of the TransitionInterface.",1],["TransitionInterface","Workflux\\Transition","Workflux\/Transition\/TransitionInterface.html","","TransitionInterface implementations model the connections",1],["StateMachineBuilder::__construct","Workflux\\Builder\\StateMachineBuilder","Workflux\/Builder\/StateMachineBuilder.html#method___construct","(array $options = array())","",2],["StateMachineBuilder::setStateMachineName","Workflux\\Builder\\StateMachineBuilder","Workflux\/Builder\/StateMachineBuilder.html#method_setStateMachineName","(string $state_machine_name)","Sets the state machine's name.",2],["StateMachineBuilder::addState","Workflux\\Builder\\StateMachineBuilder","Workflux\/Builder\/StateMachineBuilder.html#method_addState","(<a href=\"Workflux\/State\/StateInterface.html\"><abbr title=\"Workflux\\State\\StateInterface\">StateInterface<\/abbr><\/a> $state)","Adds the given state to the state machine setup.",2],["StateMachineBuilder::addStates","Workflux\\Builder\\StateMachineBuilder","Workflux\/Builder\/StateMachineBuilder.html#method_addStates","(array $states)","Adds the given states to the state machine setup.",2],["StateMachineBuilder::addTransition","Workflux\\Builder\\StateMachineBuilder","Workflux\/Builder\/StateMachineBuilder.html#method_addTransition","(<a href=\"Workflux\/Transition\/TransitionInterface.html\"><abbr title=\"Workflux\\Transition\\TransitionInterface\">TransitionInterface<\/abbr><\/a> $transition, string $event_name = &#039;&#039;)","Adds a single transition to the state machine setup",2],["StateMachineBuilder::addTransitions","Workflux\\Builder\\StateMachineBuilder","Workflux\/Builder\/StateMachineBuilder.html#method_addTransitions","(array $event_transitions)","Convenience method for adding multiple event-transition",2],["StateMachineBuilder::build","Workflux\\Builder\\StateMachineBuilder","Workflux\/Builder\/StateMachineBuilder.html#method_build","()","Verifies the builder's current state and builds a state",2],["StateMachineBuilderInterface::setStateMachineName","Workflux\\Builder\\StateMachineBuilderInterface","Workflux\/Builder\/StateMachineBuilderInterface.html#method_setStateMachineName","(string $state_machine_name)","Sets the state machine's name.",2],["StateMachineBuilderInterface::addState","Workflux\\Builder\\StateMachineBuilderInterface","Workflux\/Builder\/StateMachineBuilderInterface.html#method_addState","(<a href=\"Workflux\/State\/StateInterface.html\"><abbr title=\"Workflux\\State\\StateInterface\">StateInterface<\/abbr><\/a> $state)","Adds the given state to the state machine setup.",2],["StateMachineBuilderInterface::addStates","Workflux\\Builder\\StateMachineBuilderInterface","Workflux\/Builder\/StateMachineBuilderInterface.html#method_addStates","(array $states)","Adds the given states to the state machine setup.",2],["StateMachineBuilderInterface::addTransition","Workflux\\Builder\\StateMachineBuilderInterface","Workflux\/Builder\/StateMachineBuilderInterface.html#method_addTransition","(<a href=\"Workflux\/Transition\/TransitionInterface.html\"><abbr title=\"Workflux\\Transition\\TransitionInterface\">TransitionInterface<\/abbr><\/a> $transition, string $event_name = &#039;&#039;)","Adds a single transition to the state machine setup",2],["StateMachineBuilderInterface::addTransitions","Workflux\\Builder\\StateMachineBuilderInterface","Workflux\/Builder\/StateMachineBuilderInterface.html#method_addTransitions","(array $event_transitions)","Convenience method for adding multiple event-transition",2],["StateMachineBuilderInterface::build","Workflux\\Builder\\StateMachineBuilderInterface","Workflux\/Builder\/StateMachineBuilderInterface.html#method_build","()","Verifies the builder's current state and builds a state",2],["StatesVerification::__construct","Workflux\\Builder\\StatesVerification","Workflux\/Builder\/StatesVerification.html#method___construct","(array $states, array $transitions)","",2],["StatesVerification::verify","Workflux\\Builder\\StatesVerification","Workflux\/Builder\/StatesVerification.html#method_verify","()","Performs a specific verfication.",2],["TransitionsVerification::__construct","Workflux\\Builder\\TransitionsVerification","Workflux\/Builder\/TransitionsVerification.html#method___construct","(array $states, array $transitions)","",2],["TransitionsVerification::verify","Workflux\\Builder\\TransitionsVerification","Workflux\/Builder\/TransitionsVerification.html#method_verify","()","Performs a specific verfication.",2],["VerificationInterface::verify","Workflux\\Builder\\VerificationInterface","Workflux\/Builder\/VerificationInterface.html#method_verify","()","Performs a specific verfication.",2],["XmlStateMachineBuilder::build","Workflux\\Builder\\XmlStateMachineBuilder","Workflux\/Builder\/XmlStateMachineBuilder.html#method_build","()","Verifies the builder's current state and builds a state",2],["ExecutionContext::__construct","Workflux\\ExecutionContext","Workflux\/ExecutionContext.html#method___construct","(string $state_machine_name, string $current_state_name, array $attributes = array())","Creates a new ExecutionContext instance.",2],["ExecutionContext::getStateMachineName","Workflux\\ExecutionContext","Workflux\/ExecutionContext.html#method_getStateMachineName","()","Returns the name of the state machine, where the execution",2],["ExecutionContext::getCurrentStateName","Workflux\\ExecutionContext","Workflux\/ExecutionContext.html#method_getCurrentStateName","()","Returns the name of the state machine state, where",2],["ExecutionContext::onStateEntry","Workflux\\ExecutionContext","Workflux\/ExecutionContext.html#method_onStateEntry","(<a href=\"Workflux\/State\/StateInterface.html\"><abbr title=\"Workflux\\State\\StateInterface\">StateInterface<\/abbr><\/a> $state)","Is called when the state machine enters a new state.",2],["ExecutionContext::onStateExit","Workflux\\ExecutionContext","Workflux\/ExecutionContext.html#method_onStateExit","(<a href=\"Workflux\/State\/StateInterface.html\"><abbr title=\"Workflux\\State\\StateInterface\">StateInterface<\/abbr><\/a> $state)","Is called when the state machine exits it's state.",2],["ExecutionContextInterface::getStateMachineName","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_getStateMachineName","()","Returns the name of the state machine, where the execution",2],["ExecutionContextInterface::getCurrentStateName","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_getCurrentStateName","()","Returns the name of the state machine state, where",2],["ExecutionContextInterface::hasParameter","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_hasParameter","(string $key)","Tells if the context has a specific parameter.",2],["ExecutionContextInterface::getParameter","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_getParameter","(string $key, mixed $default = null)","Returns the value for the given parameter key.",2],["ExecutionContextInterface::getParameters","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_getParameters","()","Returns execution context's parameters.",2],["ExecutionContextInterface::setParameter","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_setParameter","(string $key, mixed $value, bool $replace = true)","Sets the given parameter.",2],["ExecutionContextInterface::removeParameter","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_removeParameter","(string $key)","Removes a parameter given by key.",2],["ExecutionContextInterface::clearParameters","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_clearParameters","()","Clears all parameters.",2],["ExecutionContextInterface::setParameters","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_setParameters","(array $parameters)","Sets the given parameters.",2],["ExecutionContextInterface::onStateEntry","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_onStateEntry","(<a href=\"Workflux\/State\/StateInterface.html\"><abbr title=\"Workflux\\State\\StateInterface\">StateInterface<\/abbr><\/a> $state)","Is called when the state machine enters a new state.",2],["ExecutionContextInterface::onStateExit","Workflux\\ExecutionContextInterface","Workflux\/ExecutionContextInterface.html#method_onStateExit","(<a href=\"Workflux\/State\/StateInterface.html\"><abbr title=\"Workflux\\State\\StateInterface\">StateInterface<\/abbr><\/a> $state)","Is called when the state machine exits it's state.",2],["CallbackGuard::__construct","Workflux\\Guard\\CallbackGuard","Workflux\/Guard\/CallbackGuard.html#method___construct","(callable $callback)","Creates a new CallbackGuard instance.",2],["CallbackGuard::accept","Workflux\\Guard\\CallbackGuard","Workflux\/Guard\/CallbackGuard.html#method_accept","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Tells if a given stateful subject is acceptable and",2],["CallbackGuard::__toString","Workflux\\Guard\\CallbackGuard","Workflux\/Guard\/CallbackGuard.html#method___toString","()","",2],["ConfigurableGuard::__construct","Workflux\\Guard\\ConfigurableGuard","Workflux\/Guard\/ConfigurableGuard.html#method___construct","(array $options = array())","Creates a new ConfigurableGuard instance, thereby setting",2],["ExpressionGuard::__construct","Workflux\\Guard\\ExpressionGuard","Workflux\/Guard\/ExpressionGuard.html#method___construct","(array $options = array())","Creates a new ConfigurableGuard instance, thereby setting",2],["ExpressionGuard::accept","Workflux\\Guard\\ExpressionGuard","Workflux\/Guard\/ExpressionGuard.html#method_accept","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Tells if a given stateful subject is acceptable and",2],["ExpressionGuard::__toString","Workflux\\Guard\\ExpressionGuard","Workflux\/Guard\/ExpressionGuard.html#method___toString","()","",2],["GuardInterface::accept","Workflux\\Guard\\GuardInterface","Workflux\/Guard\/GuardInterface.html#method_accept","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Tells if a given stateful subject is acceptable and",2],["GuardInterface::__toString","Workflux\\Guard\\GuardInterface","Workflux\/Guard\/GuardInterface.html#method___toString","()","",2],["VariableGuard::accept","Workflux\\Guard\\VariableGuard","Workflux\/Guard\/VariableGuard.html#method_accept","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Evaluates the configured (symfony) expression for the",2],["ParserInterface::parse","Workflux\\Parser\\ParserInterface","Workflux\/Parser\/ParserInterface.html#method_parse","(mixed $payload)","Parses the given payload and returns the corresponding",2],["AbstractXmlParser::__construct","Workflux\\Parser\\Xml\\AbstractXmlParser","Workflux\/Parser\/Xml\/AbstractXmlParser.html#method___construct","(array $options = array())","Creates a new StateMachineDefinitionParser instance.",2],["AbstractXmlParser::parse","Workflux\\Parser\\Xml\\AbstractXmlParser","Workflux\/Parser\/Xml\/AbstractXmlParser.html#method_parse","(string $xml_file)","Parses the given xml file and returns the corresponding",2],["OptionsXpathParser::__construct","Workflux\\Parser\\Xml\\OptionsXpathParser","Workflux\/Parser\/Xml\/OptionsXpathParser.html#method___construct","(<a href=\"Workflux\/Parser\/Xml\/Xpath.html\"><abbr title=\"Workflux\\Parser\\Xml\\Xpath\">Xpath<\/abbr><\/a> $xpath)","Creates a new OptionsXpathParser instance that uses",2],["OptionsXpathParser::literalize","Workflux\\Parser\\Xml\\OptionsXpathParser","Workflux\/Parser\/Xml\/OptionsXpathParser.html#method_literalize","(string $value)","Takes a xml node value and casts it to it's php scalar",2],["OptionsXpathParser::literalizeString","Workflux\\Parser\\Xml\\OptionsXpathParser","Workflux\/Parser\/Xml\/OptionsXpathParser.html#method_literalizeString","(string $value)","Takes an xml node value and returns it either as a",2],["OptionsXpathParser::parse","Workflux\\Parser\\Xml\\OptionsXpathParser","Workflux\/Parser\/Xml\/OptionsXpathParser.html#method_parse","(mixed $options_context)","Parses all options below the given 'options context'",2],["Xpath::__construct","Workflux\\Parser\\Xml\\Xpath","Workflux\/Parser\/Xml\/Xpath.html#method___construct","(<a href=\"http:\/\/php.net\/DOMDocument\"><abbr title=\"DOMDocument\">DOMDocument<\/abbr><\/a> $document, string $namespace_prefix)","Creates a new xpath instance that will use the given",2],["Xpath::query","Workflux\\Parser\\Xml\\Xpath","Workflux\/Parser\/Xml\/Xpath.html#method_query","($expression, <a href=\"http:\/\/php.net\/DOMNode\"><abbr title=\"DOMNode\">DOMNode<\/abbr><\/a> $context = null, $register_ns = null)","Takes an xpath expression and preprends the parser's",2],["AbstractRenderer::__construct","Workflux\\Renderer\\AbstractRenderer","Workflux\/Renderer\/AbstractRenderer.html#method___construct","(array $options = array())","Creates a new AbstractRenderer instance, thereby setting",2],["DotGraphRenderer::renderGraph","Workflux\\Renderer\\DotGraphRenderer","Workflux\/Renderer\/DotGraphRenderer.html#method_renderGraph","(<a href=\"Workflux\/StateMachine\/StateMachineInterface.html\"><abbr title=\"Workflux\\StateMachine\\StateMachineInterface\">StateMachineInterface<\/abbr><\/a> $state_machine)","Renders the given state machine to a specific format.",2],["GraphRendererInterface::renderGraph","Workflux\\Renderer\\GraphRendererInterface","Workflux\/Renderer\/GraphRendererInterface.html#method_renderGraph","(<a href=\"Workflux\/StateMachine\/StateMachineInterface.html\"><abbr title=\"Workflux\\StateMachine\\StateMachineInterface\">StateMachineInterface<\/abbr><\/a> $state_machine)","Renders the given state machine to a specific format.",2],["StateMachine::__construct","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method___construct","(string $name, array $states, array $transitions)","Creates a new StateMachine instance.",2],["StateMachine::getName","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method_getName","()","Returns the state machine's name.",2],["StateMachine::getInitialState","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method_getInitialState","()","Returns the state machine's initial state.",2],["StateMachine::getFinalStates","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method_getFinalStates","()","Returns the state machine's final states.",2],["StateMachine::getEventStates","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method_getEventStates","()","Returns the state machine's event states, hence states",2],["StateMachine::isEventState","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method_isEventState","($state_or_state_name)","Tells whether a given state has event based or sequential",2],["StateMachine::execute","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method_execute","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject, string $event_name)","Executes the state machine against the execution context",2],["StateMachine::getStates","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method_getStates","()","Returns all of the state machine's states.",2],["StateMachine::getState","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method_getState","($state_name)","Retrieves a state from the state machine by name.",2],["StateMachine::getTransitions","Workflux\\StateMachine\\StateMachine","Workflux\/StateMachine\/StateMachine.html#method_getTransitions","(string $state_name = &#039;&#039;, string $event_name = &#039;&#039;)","Depending on what parameters are set either all transitions",2],["StateMachineInterface::getName","Workflux\\StateMachine\\StateMachineInterface","Workflux\/StateMachine\/StateMachineInterface.html#method_getName","()","Returns the state machine's name.",2],["StateMachineInterface::execute","Workflux\\StateMachine\\StateMachineInterface","Workflux\/StateMachine\/StateMachineInterface.html#method_execute","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject, string $event_name)","Executes the state machine against the execution context",2],["StateMachineInterface::getInitialState","Workflux\\StateMachine\\StateMachineInterface","Workflux\/StateMachine\/StateMachineInterface.html#method_getInitialState","()","Returns the state machine's initial state.",2],["StateMachineInterface::getFinalStates","Workflux\\StateMachine\\StateMachineInterface","Workflux\/StateMachine\/StateMachineInterface.html#method_getFinalStates","()","Returns the state machine's final states.",2],["StateMachineInterface::getEventStates","Workflux\\StateMachine\\StateMachineInterface","Workflux\/StateMachine\/StateMachineInterface.html#method_getEventStates","()","Returns the state machine's event states, hence states",2],["StateMachineInterface::getStates","Workflux\\StateMachine\\StateMachineInterface","Workflux\/StateMachine\/StateMachineInterface.html#method_getStates","()","Returns all of the state machine's states.",2],["StateMachineInterface::getState","Workflux\\StateMachine\\StateMachineInterface","Workflux\/StateMachine\/StateMachineInterface.html#method_getState","($state_name)","Retrieves a state from the state machine by name.",2],["StateMachineInterface::isEventState","Workflux\\StateMachine\\StateMachineInterface","Workflux\/StateMachine\/StateMachineInterface.html#method_isEventState","(mixed $state_name)","Tells whether a given state has event based or sequential",2],["StateMachineInterface::getTransitions","Workflux\\StateMachine\\StateMachineInterface","Workflux\/StateMachine\/StateMachineInterface.html#method_getTransitions","(string $state_name = &#039;&#039;, string $event_name = &#039;&#039;)","Depending on what parameters are set either all transitions",2],["State::__construct","Workflux\\State\\State","Workflux\/State\/State.html#method___construct","(string $name, string $type = self::TYPE_ACTIVE, array $options = array())","Creates a new State instance.",2],["State::getName","Workflux\\State\\State","Workflux\/State\/State.html#method_getName","()","Returns the state's name.",2],["State::getType","Workflux\\State\\State","Workflux\/State\/State.html#method_getType","()","Returns the state's type.",2],["State::isInitial","Workflux\\State\\State","Workflux\/State\/State.html#method_isInitial","()","Tells if a the state is the initial state of the state",2],["State::isActive","Workflux\\State\\State","Workflux\/State\/State.html#method_isActive","()","Tells if a the state is a active state of the state",2],["State::isFinal","Workflux\\State\\State","Workflux\/State\/State.html#method_isFinal","()","Tells if a the state is an final state of the state",2],["State::onEntry","Workflux\\State\\State","Workflux\/State\/State.html#method_onEntry","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Runs a specific action when the parent state machine",2],["State::onExit","Workflux\\State\\State","Workflux\/State\/State.html#method_onExit","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Runs a specific action when the parent state machine",2],["StateInterface::getName","Workflux\\State\\StateInterface","Workflux\/State\/StateInterface.html#method_getName","()","Returns the state's name.",2],["StateInterface::getType","Workflux\\State\\StateInterface","Workflux\/State\/StateInterface.html#method_getType","()","Returns the state's type.",2],["StateInterface::isInitial","Workflux\\State\\StateInterface","Workflux\/State\/StateInterface.html#method_isInitial","()","Tells if a the state is the initial state of the state",2],["StateInterface::isActive","Workflux\\State\\StateInterface","Workflux\/State\/StateInterface.html#method_isActive","()","Tells if a the state is a active state of the state",2],["StateInterface::isFinal","Workflux\\State\\StateInterface","Workflux\/State\/StateInterface.html#method_isFinal","()","Tells if a the state is an final state of the state",2],["StateInterface::onEntry","Workflux\\State\\StateInterface","Workflux\/State\/StateInterface.html#method_onEntry","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Runs a specific action when the parent state machine",2],["StateInterface::onExit","Workflux\\State\\StateInterface","Workflux\/State\/StateInterface.html#method_onExit","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Runs a specific action when the parent state machine",2],["VariableState::onEntry","Workflux\\State\\VariableState","Workflux\/State\/VariableState.html#method_onEntry","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Propagates the new state machine position to the execution",2],["VariableState::onExit","Workflux\\State\\VariableState","Workflux\/State\/VariableState.html#method_onExit","(<a href=\"Workflux\/StatefulSubjectInterface.html\"><abbr title=\"Workflux\\StatefulSubjectInterface\">StatefulSubjectInterface<\/abbr><\/a> $subject)","Propagates the new state machine position to the execution",2],["StatefulSubjectInterface::getExecutionContext","Workflux\\StatefulSubjectInterface","Workflux\/StatefulSubjectInterface.html#method_getExecutionContext","()","Returns the subject's execution context.",2],["Transition::__construct","Workflux\\Transition\\Transition","Workflux\/Transition\/Transition.html#method___construct","(mixed $incoming_state_name_or_names, string $outgoing_state_name, <a href=\"Workflux\/Guard\/GuardInterface.html\"><abbr title=\"Workflux\\Guard\\GuardInterface\">GuardInterface<\/abbr><\/a> $guard = null)","Creates a new Transition instance.",2],["Transition::getIncomingStateNames","Workflux\\Transition\\Transition","Workflux\/Transition\/Transition.html#method_getIncomingStateNames","()","Returns the names of the transition's incoming states.",2],["Transition::getOutgoingStateName","Workflux\\Transition\\Transition","Workflux\/Transition\/Transition.html#method_getOutgoingStateName","()","Returns the name of the transition's outgoing state.",2],["Transition::getGuard","Workflux\\Transition\\Transition","Workflux\/Transition\/Transition.html#method_getGuard","()","Returns the transition's guard.",2],["Transition::hasGuard","Workflux\\Transition\\Transition","Workflux\/Transition\/Transition.html#method_hasGuard","()","Tells whether the transition has a guard or not.",2],["TransitionInterface::getIncomingStateNames","Workflux\\Transition\\TransitionInterface","Workflux\/Transition\/TransitionInterface.html#method_getIncomingStateNames","()","Returns the names of the transition's incoming states.",2],["TransitionInterface::getOutgoingStateName","Workflux\\Transition\\TransitionInterface","Workflux\/Transition\/TransitionInterface.html#method_getOutgoingStateName","()","Returns the name of the transition's outgoing state.",2],["TransitionInterface::getGuard","Workflux\\Transition\\TransitionInterface","Workflux\/Transition\/TransitionInterface.html#method_getGuard","()","Returns the transition's guard.",2],["TransitionInterface::hasGuard","Workflux\\Transition\\TransitionInterface","Workflux\/Transition\/TransitionInterface.html#method_hasGuard","()","Tells whether the transition has a guard or not.",2]]
    }
}
search_data['index']['longSearchIndex'] = search_data['index']['searchIndex']