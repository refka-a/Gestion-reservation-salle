<?php
namespace App\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Form\BookingType;
use App\Repository\BookingRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Booking;
use AppBundle;
class reservationController extends Controller {


 /**
     * @Route("/admin/reservation")
     */
    public function showAction() {
        
        $booking = $this->getDoctrine()
        ->getRepository('App\Entity\Booking')
        ->findAll();
        
        return $this->render(
            '/reserv/reservation.html.twig',
            array('booking' => $booking)
            );
        
   

}
    /**
     * @Route("/admin/reservation/edit/{id}")
     */
    public function edit(Request $request, Booking $booking)
    {
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect('/admin/reservation');
        }

        return $this->render('reserv/edit.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }

 /**
     * @Route("/admin/delete/{id}")
     */
    public function deleteAction($id) {
        
        $em = $this->getDoctrine()->getManager();
        $booking = $em->getRepository('App\Entity\Booking')->find($id);
        
        if (!$booking) {
            throw $this->createNotFoundException(
                'There are no reservation with the following id: ' . $id
                );
        }
        
        $em->remove($booking);
        $em->flush();
        
        return $this->redirect('/admin/reservation');
        
    }

    
     }
?>
