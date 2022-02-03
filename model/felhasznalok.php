<?php

class User {
    
    private $id;
    private $felhasznalo;
    private $jelszo;

    public function set_user($id, $conn) {
        $sql = "SELECT id, felhasznalo, jelszo FROM felhasznalok";
        $sql .= " WHERE id = $id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->id = $row['id'];
                $this->felhasznalo = $row['felhasznalo'];
                $this->jelszo = $row['jelszo'];
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    public function get_jelszo() {
        return $this->jelszo;
    }

    public function get_felhasznalo() {
        return $this->felhasznalo;
    }


    public function get_id() {
        return $this->id;
    }

    public function felhasznalokListaja($conn) {
        $lista = array();
        $sql = "SELECT id FROM felhasznalok";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $lista[] = $row['id'];
                }
            }
        }
        return $lista;
    }
}
?>