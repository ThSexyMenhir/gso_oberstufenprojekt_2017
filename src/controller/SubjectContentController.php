<?php

if (!class_exists("AbstractController")) {
    include __DIR__ . "/AbstractController.php";
}
if (!class_exists("TeacherController")) {
    include __DIR__ . "/TeacherController.php";
}
if (!class_exists("EvaluationsSheetController")) {
    include __DIR__ . "/TeacherController.php";
}

class SubjectContentController extends AbstractController {

    protected $tableName = "Stundeninhalte";

    public function edit() {

    }

    public function add() {

    }

    public function getEntitiesForOverview($startDate, $endDate, array $where = [], array $orderBy = []) {

        $where["datum"] = ["between", "'" . $startDate . "' and '" . $endDate . "'"];

        $evaluationSheetController = new EvaluationSheetController();
        $evaluationSheets = $evaluationSheetController->getEntities(array("id_lehrer" => array("=", $_SESSION['gos-kalender']['id_lehrer'])));

        $sheetIds = "(";
        foreach ($evaluationSheets as $evaluationSheet){
            $sheetIds .= $evaluationSheet["id"] . ",";
        }
        $sheetIds = substr($sheetIds, 0, -1);
        $sheetIds .= ")";

        $where["id_bewertungsbogen"] = array("IN", $sheetIds);

        $result = parent::getEntities($where);



        $subjects = [];
        $weekdays = [0 => "monday", 1 => "tuesday", 2 => "wednesday", 3 => "thursday", 4 => "friday"];
        for ($i = 0; $i < 5; $i++) {
            foreach ($weekdays as $key => $day) {
                foreach ($result as $values) {
                    $tmpDay = datetime("d", $values["datum"]);
                    if ($values["block"] == $i + 1 && $key == $tmpDay) {
                        $subjects[$i][$day] = [
                            "idKlasse" => $values["id_klasse"],
                            "idLehrer" => $values["is_lehrer"],
                            "block" => $values["block"],
                            "datum" => $values["datum"],
                            "notizen" => $values["notizen"],
                            "id" => $values["id"]
                        ];
                    }
                }
            }
        }


        return $subjects;
    }

}
