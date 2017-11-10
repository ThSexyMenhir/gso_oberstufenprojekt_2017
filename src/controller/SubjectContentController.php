<?php

if (!class_exists("AbstractController")) {
    include __DIR__ . "/AbstractController.php";
}
if (!class_exists("TeacherController")) {
    include __DIR__ . "/TeacherController.php";
}
if (!class_exists("EvaluationSheetController")) {
    include __DIR__ . "/EvaluationSheetController.php";
}

class SubjectContentController extends AbstractController {

    protected $tableName = "Stundeninhalte";

    public function edit($id, $block, $datum, $notizen, $idBewertungsbogen) {
        $values = array(
            "block" => $block,
            "datum" => $datum,
            "notizen" => $notizen,
            "idBewertungsbogen" => $idBewertungsbogen
        );

        $this->dataBaseController->update($id, $values);
    }

    public function add($block, $datum, $notizen, $idBewertungsbogen) {

        $values = array(
            "block" => $block,
            "datum" => $datum,
            "notizen" => $notizen,
            "idBwertungsbogen" => $idBewertungsbogen
        );

        return $this->dataBaseController->insert($values);
    }

    public function delete($id) {
        parent::delete($id);
    }

    public function getEntitiesForOverview($startDate, $endDate, array $where = [], array $orderBy = []) {

        $where["datum"] = ["BETWEEN", "'" . $startDate . "' AND '" . $endDate . "'"];

        $evaluationSheetController = new EvaluationSheetController();
        $evaluationSheets = $evaluationSheetController->getEntities(array("id_lehrer" => array("=", $_SESSION['gos-kalender']['id_lehrer'])));

        if (empty($evaluationSheets)){
            return null;
        }
        $sheetIds = "(";
        foreach ($evaluationSheets as $evaluationSheet){
            $sheetIds .= $evaluationSheet["id"] . ",";
        }
        $sheetIds = substr($sheetIds, 0, -1);
        $sheetIds .= ")";

        $where["id_bewertungsbogen"] = array("IN", $sheetIds);

        $result = parent::getEntities($where);

        if (empty($result)){
            return null;
        }

        $subjects = [];
        $weekdays = [0 => "monday", 1 => "tuesday", 2 => "wednesday", 3 => "thursday", 4 => "friday"];
        for ($i = 0; $i < 5; $i++) {
            foreach ($weekdays as $key => $day) {
                foreach ($result as $values) {
                    $datetime = new DateTime($values["datum"]);
                    $tmpDay = $datetime->format("w");
                    if ($values["block"] == $i + 1 && $key == $tmpDay) {
                        $subjects[$i][$day] = [
                            "block" => $values["block"],
                            "datum" => $values["datum"],
                            "notizen" => $values["notizen"],
                            "id" => $values["id"],
                            "id_bewertungsbogen" => $values["id_bewertungsbogen"]
                        ];
                    }
                }
            }
        }

        return $subjects;
    }

    public function getEntitiesForDay($curDate, array $where = [], array $orderBy = []) {

        $where["datum"] = ["LIKE", $curDate];

        $evaluationSheetController = new EvaluationSheetController();
        $evaluationSheets = $evaluationSheetController->getEntities(array("id_lehrer" => array("=", $_SESSION['gos-kalender']['id_lehrer'])));

        if (empty($evaluationSheets)){
            return null;
        }
        $sheetIds = "(";
        foreach ($evaluationSheets as $evaluationSheet){
            $sheetIds .= $evaluationSheet["id"] . ",";
        }
        $sheetIds = substr($sheetIds, 0, -1);
        $sheetIds .= ")";

        $where["id_bewertungsbogen"] = array("IN", $sheetIds);

        $result = parent::getEntities($where);

        if (empty($result)){
            return null;
        }

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
