<?php $selected_content_id = (string) @$_GET['content_id'] ?? ''; ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>

  <script src="./node_modules/blockly/blockly_compressed.js"></script>
  <script src="./node_modules/blockly/javascript_compressed.js"></script>
  <script src="./node_modules/blockly/python_compressed.js"></script>

  <script src="./node_modules/blockly/blocks_compressed.js"></script>
  <script src="./node_modules/blockly/msg/en.js"></script>

  <script src="./blockly.mjs"></script>


</head>

<body onload="start()">
  <h4 style="color: white;"><b>You have <span id="capacity"></span> block(s) left.</b></h4>

  <p>
    <!-- <button onclick="showCode()">Show Python</button> -->
    <button onclick="clearCode()" class="btn btn-primary text-truncate border rounded border-light shadow-none float-end tenant-continue-btn" data-bss-hover-animate="pulse" type="button" style="background: #360062; margin-right: 15px;">Clear</button>
    <button onclick="copyCode()" class="btn btn-primary text-truncate border rounded border-light shadow-none float-end tenant-continue-btn" data-bss-hover-animate="pulse" type="button" style="background: #360062; margin-right: 15px;">Copy</button>
    <button onclick="showCode()" class="btn btn-primary text-truncate border rounded border-light shadow-none float-end tenant-continue-btn" data-bss-hover-animate="pulse" type="button" style="background: #360062; margin-right: 15px;">Show code</button>
    <!-- <button onclick="runCode()">Run Python</button> -->
  </p>



  <div class="container text-center" style="margin-top: 55px;">
    <!-- textarea to receive generated code -->
    <form action="functions/student functions.php" id="generatedCodeForm" method="get">
      <textarea id="generatedCode" style="width: 25%; height: 550px; float: right; resize:none" readonly placeholder="                    Your code is here"></textarea>
      
    </form>

    <div id="blocklyDiv" style="height: 550px; width: 1000px; margin-bottom: 50px;"></div>
    <p style="color: white;"><span>Paste your code into the environment below to test it.</span></p>
    <!-- python interpreter without blocks -->
    <iframe id="trinketInterpreter" src="https://trinket.io/embed/python/1238a62f4d?toggleCode=true&runOption=run" style="margin: top 50px; " width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>

  </div>




  <xml xmlns="https://developers.google.com/blockly/xml" id="toolbox" style="display: none">
    <category name="Logic" colour="%{BKY_LOGIC_HUE}">
      <category name="If">
        <block type="controls_if"></block>
        <block type="controls_if">
          <mutation else="1"></mutation>
        </block>
        <block type="controls_if">
          <mutation elseif="1" else="1"></mutation>
        </block>
      </category>
      <category name="Boolean" colour="%{BKY_LOGIC_HUE}">
        <block type="logic_compare"></block>
        <block type="logic_operation"></block>
        <block type="logic_negate"></block>
        <block type="logic_boolean"></block>
        <block type="logic_null"></block>
        <block type="logic_ternary"></block>
      </category>
    </category>
    <category name="Loops" colour="%{BKY_LOOPS_HUE}">
      <block type="controls_repeat_ext">
        <value name="TIMES">
          <block type="math_number">
            <field name="NUM">10</field>
          </block>
        </value>
      </block>
      <block type="controls_whileUntil"></block>
      <block type="controls_for">
        <field name="VAR">i</field>
        <value name="FROM">
          <block type="math_number">
            <field name="NUM">1</field>
          </block>
        </value>
        <value name="TO">
          <block type="math_number">
            <field name="NUM">10</field>
          </block>
        </value>
        <value name="BY">
          <block type="math_number">
            <field name="NUM">1</field>
          </block>
        </value>
      </block>
      <block type="controls_forEach"></block>
      <block type="controls_flow_statements"></block>
    </category>
    <category name="Text" colour="%{BKY_TEXTS_HUE}">
      <block type="text"></block>
      <block type="text_length"></block>
      <block type="text_print"></block>
    </category>
    <category name="Math" colour="%{BKY_MATH_HUE}">
      <block type="math_number">
        <field name="NUM">123</field>
      </block>
      <block type="math_arithmetic"></block>
      <block type="math_single"></block>
      <block type="math_trig"></block>
      <block type="math_constant"></block>
      <block type="math_number_property"></block>
      <block type="math_round"></block>
      <block type="math_on_list"></block>
      <block type="math_modulo"></block>
      <block type="math_constrain">
        <value name="LOW">
          <block type="math_number">
            <field name="NUM">1</field>
          </block>
        </value>
        <value name="HIGH">
          <block type="math_number">
            <field name="NUM">100</field>
          </block>
        </value>
      </block>
      <block type="math_random_int">
        <value name="FROM">
          <block type="math_number">
            <field name="NUM">1</field>
          </block>
        </value>
        <value name="TO">
          <block type="math_number">
            <field name="NUM">100</field>
          </block>
        </value>
      </block>
      <block type="math_random_float"></block>
      <block type="math_atan2"></block>
    </category>
    <category name="Lists" colour="%{BKY_LISTS_HUE}">
      <block type="lists_create_empty"></block>
      <block type="lists_create_with"></block>
      <block type="lists_repeat">
        <value name="NUM">
          <block type="math_number">
            <field name="NUM">5</field>
          </block>
        </value>
      </block>
      <block type="lists_length"></block>
      <block type="lists_isEmpty"></block>
      <block type="lists_indexOf"></block>
      <block type="lists_getIndex"></block>
      <block type="lists_setIndex"></block>
    </category>
    <sep></sep>
    <category name="Variables" custom="VARIABLE" colour="%{BKY_VARIABLES_HUE}">
    </category>
    <category name="Functions" custom="PROCEDURE" colour="%{BKY_PROCEDURES_HUE}">
    </category>
    <sep></sep>
    <category name="Library" expanded="true">
      <category name="Randomize">
        <block type="procedures_defnoreturn">
          <mutation>
            <arg name="list"></arg>
          </mutation>
          <field name="NAME">randomize</field>
          <statement name="STACK">
            <block type="controls_for" inline="true">
              <field name="VAR">x</field>
              <value name="FROM">
                <block type="math_number">
                  <field name="NUM">1</field>
                </block>
              </value>
              <value name="TO">
                <block type="lists_length" inline="false">
                  <value name="VALUE">
                    <block type="variables_get">
                      <field name="VAR">list</field>
                    </block>
                  </value>
                </block>
              </value>
              <value name="BY">
                <block type="math_number">
                  <field name="NUM">1</field>
                </block>
              </value>
              <statement name="DO">
                <block type="variables_set" inline="false">
                  <field name="VAR">y</field>
                  <value name="VALUE">
                    <block type="math_random_int" inline="true">
                      <value name="FROM">
                        <block type="math_number">
                          <field name="NUM">1</field>
                        </block>
                      </value>
                      <value name="TO">
                        <block type="lists_length" inline="false">
                          <value name="VALUE">
                            <block type="variables_get">
                              <field name="VAR">list</field>
                            </block>
                          </value>
                        </block>
                      </value>
                    </block>
                  </value>
                  <next>
                    <block type="variables_set" inline="false">
                      <field name="VAR">temp</field>
                      <value name="VALUE">
                        <block type="lists_getIndex" inline="true">
                          <mutation statement="false" at="true"></mutation>
                          <field name="MODE">GET</field>
                          <field name="WHERE">FROM_START</field>
                          <value name="AT">
                            <block type="variables_get">
                              <field name="VAR">y</field>
                            </block>
                          </value>
                          <value name="VALUE">
                            <block type="variables_get">
                              <field name="VAR">list</field>
                            </block>
                          </value>
                        </block>
                      </value>
                      <next>
                        <block type="lists_setIndex" inline="false">
                          <value name="AT">
                            <block type="variables_get">
                              <field name="VAR">y</field>
                            </block>
                          </value>
                          <value name="LIST">
                            <block type="variables_get">
                              <field name="VAR">list</field>
                            </block>
                          </value>
                          <value name="TO">
                            <block type="lists_getIndex" inline="true">
                              <mutation statement="false" at="true"></mutation>
                              <field name="MODE">GET</field>
                              <field name="WHERE">FROM_START</field>
                              <value name="AT">
                                <block type="variables_get">
                                  <field name="VAR">x</field>
                                </block>
                              </value>
                              <value name="VALUE">
                                <block type="variables_get">
                                  <field name="VAR">list</field>
                                </block>
                              </value>
                            </block>
                          </value>
                          <next>
                            <block type="lists_setIndex" inline="false">
                              <value name="AT">
                                <block type="variables_get">
                                  <field name="VAR">x</field>
                                </block>
                              </value>
                              <value name="LIST">
                                <block type="variables_get">
                                  <field name="VAR">list</field>
                                </block>
                              </value>
                              <value name="TO">
                                <block type="variables_get">
                                  <field name="VAR">temp</field>
                                </block>
                              </value>
                            </block>
                          </next>
                        </block>
                      </next>
                    </block>
                  </next>
                </block>
              </statement>
            </block>
          </statement>
        </block>
      </category>
      <category name="Jabberwocky">
        <block type="text_print">
          <value name="TEXT">
            <block type="text">
              <field name="TEXT">'Twas brillig, and the slithy toves</field>
            </block>
          </value>
          <next>
            <block type="text_print">
              <value name="TEXT">
                <block type="text">
                  <field name="TEXT"> Did gyre and gimble in the wabe:</field>
                </block>
              </value>
              <next>
                <block type="text_print">
                  <value name="TEXT">
                    <block type="text">
                      <field name="TEXT">All mimsy were the borogroves,</field>
                    </block>
                  </value>
                  <next>
                    <block type="text_print">
                      <value name="TEXT">
                        <block type="text">
                          <field name="TEXT"> And the mome raths outgrabe.</field>
                        </block>
                      </value>
                    </block>
                  </next>
                </block>
              </next>
            </block>
          </next>
        </block>
        <block type="text_print">
          <value name="TEXT">
            <block type="text">
              <field name="TEXT">"Beware the Jabberwock, my son!</field>
            </block>
          </value>
          <next>
            <block type="text_print">
              <value name="TEXT">
                <block type="text">
                  <field name="TEXT"> The jaws that bite, the claws that catch!</field>
                </block>
              </value>
              <next>
                <block type="text_print">
                  <value name="TEXT">
                    <block type="text">
                      <field name="TEXT">Beware the Jubjub bird, and shun</field>
                    </block>
                  </value>
                  <next>
                    <block type="text_print">
                      <value name="TEXT">
                        <block type="text">
                          <field name="TEXT"> The frumious Bandersnatch!"</field>
                        </block>
                      </value>
                    </block>
                  </next>
                </block>
              </next>
            </block>
          </next>
        </block>
      </category>
    </category>
  </xml>

  <xml xmlns="https://developers.google.com/blockly/xml" id="startBlocks" style="display: none">
    <block type="controls_if" inline="false" x="20" y="20">
      <mutation else="1"></mutation>
      <value name="IF0">
        <block type="logic_compare" inline="true">
          <field name="OP">EQ</field>
          <value name="A">
            <block type="math_arithmetic" inline="true">
              <field name="OP">MULTIPLY</field>
              <value name="A">
                <block type="math_number">
                  <field name="NUM">6</field>
                </block>
              </value>
              <value name="B">
                <block type="math_number">
                  <field name="NUM">7</field>
                </block>
              </value>
            </block>
          </value>
          <value name="B">
            <block type="math_number">
              <field name="NUM">42</field>
            </block>
          </value>
        </block>
      </value>
      <statement name="DO0">
        <block type="text_print" inline="false">
          <value name="TEXT">
            <block type="text">
              <field name="TEXT">Don't panic</field>
            </block>
          </value>
        </block>
      </statement>
      <statement name="ELSE">
        <block type="text_print" inline="false">
          <value name="TEXT">
            <block type="text">
              <field name="TEXT">Panic</field>
            </block>
          </value>
        </block>
      </statement>
    </block>

  </xml>

  <?php
  //suppress warnings
  error_reporting(E_ALL ^ E_WARNING);

  #get max_blocks from content table
  $sql = "SELECT max_blocks FROM content WHERE id = $selected_content_id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $max_blocks = $row['max_blocks'];
    }
  } else {
    $max_blocks = 0;
  }

  ?>

  <script>
    var demoWorkspace = Blockly.inject('blocklyDiv', {
      media: 'https://unpkg.com/blockly/media/',
      maxBlocks: <?php
                  if ($max_blocks == 0) {
                    echo 'Infinity';
                  } else {
                    echo $max_blocks;
                  } ?>,
      toolbox: document.getElementById('toolbox'),

      grid: {
        spacing: 25,
        length: 3,
        colour: '#ccc',
        snap: true
      },
      move: {
        scrollbars: {
          vertical: true,
          horizontal: true,
        }
      }
    });
    Blockly.Xml.domToWorkspace(document.getElementById('startBlocks'),
      demoWorkspace);

    function showCode() {
      // Generate python code and display it.
      Blockly.Python.INFINITE_LOOP_TRAP = null;
      var code = Blockly.Python.workspaceToCode(demoWorkspace);
      document.getElementById('generatedCode').value = code;
      //   alert(code);
    }

    function runCode() {
      // Generate JavaScript code and run it.
      window.LoopTrap = 1000;
      Blockly.Python.INFINITE_LOOP_TRAP =
        'if (--window.LoopTrap == 0) throw "Infinite loop.";\n';
      var code = Blockly.Python.workspaceToCode(demoWorkspace);
      Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
      try {
        eval(code);
      } catch (e) {
        alert(e);
      }
    }

    function onchange(event) {
      document.getElementById('capacity').textContent =
        demoWorkspace.remainingCapacity();
    }

    demoWorkspace.addChangeListener(onchange);
    onchange();

    //fintion to clear result text area 
    function clearCode() {
      document.getElementById('generatedCode').value = "";
    }

    //function to copy code to clipboard
    function copyCode() {
      var copyText = document.getElementById("generatedCode");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      document.execCommand("copy");

      if (copyText.value == "") {
        alert("Please generate code first.");
      } else {
        alert("Code copied to clipboard.");
      }
    }
  </script>


</body>

</html>