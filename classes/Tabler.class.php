<?php
/**
 * Description of tabler
 * I decided to WRITE my own table class because I feel like the other way is clunky. Very clunky.
 * @author Aviendha
 */
class tabler 
{
    private $headings = array();
    private $row;
    
    public function __construct()
    {
        
    }
    
    public function setHeadings($headings)
    {
        $this->headings = $headings;
    }
    
    public function addRow($row)
    {
        $this->row[] = $row;
    }
    
    public function addRows($row)
    {
        foreach ($row as $items)
        {
            $this->row[] = $items;
        }
    }
    
    public function buildTable()
    {
       
    }
    
    public function outputTable()
    { 
        
    ?>
<table>
<tr>
<?php
        foreach ($this->headings as $items)
        {
?>
<th><?php echo $items ?></th>
<?php
        }
?></tr>
<?php
        foreach ($this->row as $items)
        {
            ?>
<tr><?php
            foreach ($items as $innerItems)
            {
            ?><td> <?php echo $innerItems; ?> </td><?php
            }
            ?>
</tr>
<?php
        }
        
?>
</table>
        <?php
    }
}
?>