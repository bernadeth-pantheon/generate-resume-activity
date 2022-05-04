<?php
    $personal_data = array();

    $bernadeth = new stdClass();
        $bernadeth->last_name = "Pagkalinawan";
        $bernadeth->first_name = "Bernadeth";
        $bernadeth->middle_name = "Samson";
        $bernadeth->birthdate = date_create("1998-04-13");
        $bernadeth->home_address = "Comembo, Makati City";
        $bernadeth->email = "bernadeth@gmail.com";
        $bernadeth->contact_number = array (
            "912345",
            "987654",
            "888888",
            "967890");
        $bernadeth->schools = array (
            "University of Makati",
            "Higher School ng UMak",
            "Benigno Ninoy Aquino High School"
        );
        $bernadeth->skills['soft'] = array(
            "Social Thinking",
            "Creativity",
            "Research",
            "Management"
        );
        $bernadeth->skills['hard'] = array(
            "Japanese Proficiency",
            "Bachelor's Degree",
            "Typing Speed"
        );
        $bernadeth->certificates = array();
    $personal_data[] = $bernadeth;
    
    function calculate_age($birthdate) {
        $current_date = date_create(date("Y-m-d"));
        $age = date_diff($current_date, $birthdate);
        return $age;
    }

    foreach ($personal_data as $p) {
        $age = calculate_age($p->birthdate);
        
        echo "\nPersonal Information:";
        echo "\n Name: ".$p->last_name.", ".$p->first_name." ".$p->middle_name;
        echo "\n Birthdate: ".date_format($p->birthdate,"M d, Y");
        echo "\n Age: ".$age->format('%y years old');
        echo "\n Address: ".$p->home_address;
        echo "\n Email Address: ".$p->email;
        echo "\n Contact Number/s: ";
        foreach ($p->contact_number as $cn) {
            echo "\n  -$cn";
            if((int)$cn >= 910000 && (int)$cn <= 949999) {
                echo "[g]"; //globe
            } else if ((int)$cn > 949999 && (int)$cn < 1000000) {
                echo "[s]"; //smart
            } else echo "[u]";//unknown
        }
        echo "\n Schools Attended:";
        foreach ($p->schools as $sc) {
            echo "\n  -$sc";
        }
        echo "\nSkills:";
        foreach ($p->skills as $key => $sk) {
            echo "\n  [".ucwords($key)."][a-z]";
            asort($sk);
            foreach ($sk as $a) {
                echo "\n   -$a";
            }
        }
        if(!$p->certificates) {
            echo "\n[No Certificates]";
        }
        echo "\n- - - - - - - - -\n";
    }
?>