<?php

require_once __DIR__ . '/../models/SmsModel.php';

class SmsController
{
    private SmsModel $smsModel;

    public function __construct()
    {
        $this->smsModel = new SmsModel();
    }

    public function getGrades(): void
    {
        $rows = $this->smsModel->getGrades();

        $grades = array_map(function ($rows) {
            return [
                'id'        => (int)$rows['id'],
                'grade_no'  => $rows['grade_no'],
            ];
        }, $rows);

        http_response_code(200);
        echo json_encode([
            'grades' => $grades
        ]);
    }

    public function getClassesByGrade(): void
    {
        // Validate input
        if (!isset($_GET['grade_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'grade_id is required']);
            return;
        }

        $gradeId = (int) $_GET['grade_id'];

        $rows = $this->smsModel->getClassesByGrade($gradeId);

        $classes = array_map(function ($row) {
            return [
                'id'    => (int) $row['id'],
                'class' => $row['class'],
            ];
        }, $rows);

        http_response_code(200);
        echo json_encode([
            'classes' => $classes
        ]);
    }


    
}
