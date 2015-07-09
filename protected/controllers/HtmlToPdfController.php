<?php

/**
 * Description of HtmlToPdfController
 *
 * @author Sitta Endah Pricilia
 */
class HtmlToPdfController extends Controller {
    /* public function actionIndex() {
      $this->render('index');
      }

      public function actionPdf() {
      $this->renderPartial('html2pdf');
      } */

    public function actionReport($idRapat) {
        // is current user has the required privilege ?
        if (!Yii::app()->user->checkAccess('pdf_report')) {
            throw new CHttpException(
            403, 'You are not authorized to perform this action.'
            );
        }

        $rapat = Rapat::model()->findByPk($idRapat);

        $agendaRapats = $this->getAgendaRapat($idRapat);
        $agendaRapats = $this->getTempAgendas($agendaRapats);
        $daftarAbsen = $this->getAbsenAnggota($idRapat);

        $this->renderPartial('report', array(
            'rapat' => $rapat,
            'agendas' => $agendaRapats,
            'daftarAbsen' => $daftarAbsen
        ));
    }

    /**
     * Gets agendas of current meeting.
     */
    private function getAgendaRapat($id_rapat) {
        $agendaRapat = AgendaRapat::model()->findAllByAttributes(array(
            'id_rapat' => $id_rapat,
        ));

        return $agendaRapat;
    }

    /**
     * Gets detail of some tempAgendas.
     */
    private function getTempAgendas($agendaRapats) {
        foreach ($agendaRapats as $agendaRapat) {
            $agenda[] = TempAgenda::model()->findByAttributes(array(
                'id_agenda' => $agendaRapat->id_agenda
            ));
        }

        return $agenda;
    }
    
    /**
     * Gets member attendance.
     */
    private function getAbsenAnggota($id_rapat) {
        $daftarAbsen = AbsenAnggota::model()->findAllByAttributes(array(
            'id_rapat' => $id_rapat
        ));

        return $daftarAbsen;
    }

}
