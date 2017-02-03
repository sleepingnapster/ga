<?php require_once('../Connections/greenassign.php'); ?>
<?php

/*
mysql_select_db($database_greenassign, $greenassign);
$query_RsAllSubs = "SELECT sub_id FROM sub ORDER BY sub_id ASC";
$RsAllSubs = mysql_query($query_RsAllSubs, $greenassign) or die(mysql_error());
$row_RsAllSubs = mysql_fetch_assoc($RsAllSubs);
$totalRows_RsAllSubs = mysql_num_rows($RsAllSubs);

?>
<?php /* do {
if (!file_exists('../submfiles/SFIT/'.$row_RsAllSubs['sub_id'])) {
    mkdir('../submfiles/SFIT/'.$row_RsAllSubs['sub_id'], 0777, true);
}
} while ($row_RsAllSubs = mysql_fetch_assoc($RsAllSubs));
*/ ?>
  <p>ass</p>
<?php
mysql_free_result($RsAllSubs);
?>