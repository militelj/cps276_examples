<?php
/*
 * @author: Scott Shapaer
 *
 */

class Contacts
{

    private $file;
    //assigns the file path sent to the $file property
    public function  __construct($file)
    {
        $this->file = $file;
    }

  
    public function addContact($dataArray)
    {
            //if the file does not exist create it and add entry
            if (!file_exists($this->file))
            {
                $doc = new DOMDocument("1.0","UTF-8");
                $doc->formatOutput = true;
                $xml = $doc->createElement("root");
                $doc->appendChild($xml);
                $contact = $doc->createElement("contact");
                $contact->setAttribute("id",time());//insert a time stamp so id is unique
                $xml->appendChild($contact);
                $fname = $doc->createElement("firstName", $dataArray['fname']);
                $contact->appendChild($fname);
                $lname = $doc->createElement("lastName", $dataArray['lname']);
                $contact->appendChild($lname);
                $phone = $doc->createElement("phone", $dataArray['phone']);
                $contact->appendChild($phone);
                $email = $doc->createElement("email");
                $contact->appendChild($email);
                //The CDATA is used for emails because of the non numeric, non alpha characters
                $cdata = $doc->createCDATASection($dataArray['email']);
                $email->appendChild($cdata);
                $info = $doc->createElement("additionalInfo");
                $contact->appendChild($info);
                $cdata = $doc->createCDATASection($dataArray['info']);
                $info->appendChild($cdata);
                //sdoc->save saves the file as XML
                $doc->save($this->file);
            }
            
            //if file does exist add entry to bottom
            else
            {
                $doc = new DOMDocument();
                $doc->preserveWhiteSpace = false;
                $doc->load($this->file);
                $doc->formatOutput = true;
                $xmlElements = $doc->getElementsByTagName("root");
                $xml = $xmlElements->item(0);
                $contact = $doc->createElement("contact");
                $contact->setAttribute("id",time());//insert a time stamp so id is unique
                $xml->appendChild($contact);
                $fname = $doc->createElement("firstName", $dataArray['fname']);
                $contact->appendChild($fname);
                $lname = $doc->createElement("lastName", $dataArray['lname']);
                $contact->appendChild($lname);
                $phone = $doc->createElement("phone", $dataArray['phone']);
                $contact->appendChild($phone);
                $email = $doc->createElement("email");
                $contact->appendChild($email);
                //The CDATA is used for emails because of the non numeric, non alpha characters
                $cdata = $doc->createCDATASection($dataArray['email']);
                $email->appendChild($cdata);
                $info = $doc->createElement("additionalInfo");
                $contact->appendChild($info);
                $cdata = $doc->createCDATASection($dataArray['info']);
                $info->appendChild($cdata);
                //$doc->save saves the file as XML
                $doc->save($this->file);
            }

     }

     //edit an element node. Sends the id of the node to edit
     //returns an array containing all XML info. The appropriate info shows up in the
     //form fields
     public function editContact($sentId)
     {
        $dataArray = array();
        $doc = simplexml_load_file($this->file);
        //loop through XML file until ID match is found       
        for ($i=0;$i<count($doc);$i++)
        {
          //if match is found display the XML node values. Put them into an
          //associative array and return the array,
          if ((string)$doc->contact[$i]->attributes()->id === $sentId)
                {
                    $dataArray['fname']=$doc->contact[$i]->firstName;
                    $dataArray['lname']=$doc->contact[$i]->lastName;
                    $dataArray['phone']=$doc->contact[$i]->phone;
                    $dataArray['email']=$doc->contact[$i]->email;
                    $dataArray['info']=$doc->contact[$i]->additionalInfo;
                    $dataArray['uidHidden']=$sentId;
                    break;//end the loop when value is found
                }
 			
        }
        //return
        return $dataArray;
     }

     //takes the node id and if there is a match removes node.
     public function removeContact($id)
     {
        $doc = new DOMDocument();
        $doc->preserveWhiteSpace = false;
        $doc->load($this->file);
        $doc->formatOutput = true;
        $xmlElements = $doc->getElementsByTagName("root");
        $xml = $xmlElements->item(0);

        $contactElements = $doc->getElementsByTagName("contact");
        for ($i=0;$i<$contactElements->length;$i++)
        {
            if ($contactElements->item($i)->getAttribute('id') == $id)
            {
                $xml->removeChild($contactElements->item($i));
                $doc->save($this->file);
            }
        }
     }

     //takes the dataArray send from the form $_POST and updates the node
     public function updateContact($dataArray)
     {
        $doc = new DOMDocument();
        $doc->preserveWhiteSpace = false;
        $doc->load($this->file);
        $doc->formatOutput = true;

        $contactElements = $doc->getElementsByTagName("contact");
        for ($i=0;$i<$contactElements->length;$i++)
        {
            //if a match was found update the node
            if ($contactElements->item($i)->getAttribute('id') == $dataArray['uidHidden'])
            {
                $child = $contactElements->item($i)->firstChild;
                	//loop through all chidren nodes and based upon node name update appropriately.
                    do
                    {
                         switch($child->tagName)
                         {
                             case "firstName":$child->firstChild->replaceData(0,1000,$dataArray['fname']);break;
                             case "lastName":$child->firstChild->replaceData(0,1000,$dataArray['lname']);break;
                             case "phone":$child->firstChild->replaceData(0,1000,$dataArray['phone']);break;
                             case "email":$child->firstChild->replaceData(0,1000,$dataArray['email']);break;
                             case "additionalInfo":$child->firstChild->replaceData(0,1000,$dataArray['info']);break;
                         }

                    }while($child = $child->nextSibling);
                 //save to the xml file provided
                $doc->save($this->file);
            }
        }
     }

     //display the contacts of the XML file.
     public function displayContacts()
     {
        $xml = simplexml_load_file($this->file);
        //create contacts and assign empty string
        $contacts="";
        for ($i=0;$i<count($xml);$i++)
        {
              
            //remove and edit links pass the id attribute of the contact element node
            $contacts .= '<a href="'.$_SERVER['PHP_SELF'].'?r='.$xml->contact[$i]->attributes()->id.'">remove</a>&nbsp;&nbsp;';
            $contacts .= '<a href="'.$_SERVER['PHP_SELF'].'?e='.$xml->contact[$i]->attributes()->id.'">edit</a>';
            $contacts .= "<h4>".$xml->contact[$i]->firstName." ".$xml->contact[$i]->lastName."</h4>";
            $contacts .= "<p>".$xml->contact[$i]->phone."</p>";
            //htmlspecialchars converts special characters to their html elements.
            $contacts .= "<p>".htmlspecialchars($xml->contact[$i]->email)."</p>";
            //stripslashes removes any slashes on quotes that may be added via PHP magic-quotes being enabled.
            $contacts .= "<p>".htmlspecialchars(stripslashes($xml->contact[$i]->additionalInfo))."</p>";
            $contacts .= "<hr />";
        }
        //return the contact info to be displayed.
        return $contacts;
     }


}
?>
