<?php

echo "Hello <b id='welcome'><i>" .$pass['username'] . "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

$load = "<a href = " . base_url() . "index.php/pages/view/learn>here</a>";
echo "To continue press " . $load;