<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>FAQ</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .faq-container {
      max-width: 800px;
      margin: auto;
      padding: 20px;
    }

    .faq-question {
      cursor: pointer;
      padding: 12px;
      background: #f0f0f0;
      margin-top: 10px;
      font-weight: bold;
      border-radius: 5px;
    }

    .faq-answer {
      display: none;
      padding: 10px 12px;
      background: #fafafa;
      border-left: 4px solid #007BFF;
      margin-bottom: 10px;
    }

    main {
      text-align: center;
      margin: 50px;
    }
  </style>

</head>

<body>

  <!-- Load header -->

  <?php include __DIR__ . '/../../../Front/Header.html'; ?>


  <!-- Main content -->
  <main>
    <h1>Frequently Asked Questions</h1>
    <section class="faq-container">

      <div class="faq-item">
        <div class="faq-question">How can I apply for an Ethiopian passport?</div>
        <div class="faq-answer">You can apply for an Ethiopian passport online through the official website or visit the
          nearest embassy.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">What documents are required for the application?</div>
        <div class="faq-answer">You will need a birth certificate, identification card, and passport-sized photographs.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">How long does it take to process the application?</div>
        <div class="faq-answer">The processing time can vary, but it typically takes between 2 to 6 weeks.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">Can I track my application status online?</div>
        <div class="faq-answer">Yes, you can track your application status on the Ethiopian passport service website.
        </div>
      </div>

      <div class="faq-item">
        <div class="faq-question">What is the fee for applying for a passport?</div>
        <div class="faq-answer">The fee varies based on the type of passport and the processing speed you choose.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">Can I renew my Ethiopian passport online?</div>
        <div class="faq-answer">Yes, Ethiopian citizens can renew their passport online through the official immigration
          portal, provided their biometric data is already registered.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">What should I do if my passport is lost or stolen?</div>
        <div class="faq-answer">You must report the loss to the nearest police station and request a police report.
          Then, apply for a replacement passport with the required documents and a copy of the police report.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">Can I apply for a passport from outside Ethiopia?</div>
        <div class="faq-answer">Yes, Ethiopian citizens living abroad can apply through Ethiopian embassies and
          consulates. Some embassies also allow online application submissions.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">Are children required to have their own passports?</div>
        <div class="faq-answer">Yes, every Ethiopian citizen, regardless of age, must have their own passport.
          Children's passports require parental consent and legal guardianship documentation.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">What are the biometric requirements for passport issuance?</div>
        <div class="faq-answer">Applicants must provide fingerprints, a digital photo, and a digital signature at the
          time of application or during an in-person appointment.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">Can I change the information on my passport (e.g. name or date of birth)?</div>
        <div class="faq-answer">Yes, but you must submit legal documentation proving the change (e.g. court order, birth
          certificate correction) during your application.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">How can I expedite my passport application?</div>
        <div class="faq-answer">Express processing is available for an additional fee. You must select the 'Express'
          option during the application and provide justification for urgency if requested.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">Is an appointment required before visiting the passport office?</div>
        <div class="faq-answer">Yes, all visits to the passport office must be scheduled in advance using the online
          appointment booking system to avoid long wait times.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">What is the validity period of an Ethiopian passport?</div>
        <div class="faq-answer">Ethiopian passports are typically valid for 5 years from the date of issuance. Ensure to
          renew at least 6 months before expiration.</div>
      </div>

      <div class="faq-item">
        <div class="faq-question">How can I update my address or contact information?</div>
        <div class="faq-answer">You can update your contact information through your online passport service account or
          by visiting your nearest immigration office with identification.</div>
      </div>

    </section>
  </main>


  <?php include __DIR__ . '/../../../Front/footer.html' ?>



  <!-- Script to include header and footer -->
  <script>
    $(document).ready(function() {
      $(".faq-question").click(function() {
        $(this).next(".faq-answer").slideToggle(300);
      });
    });
  </script>

</body>

</html>