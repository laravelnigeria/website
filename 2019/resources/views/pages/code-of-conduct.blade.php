@extends('layouts.front')

@section('content')
<div class="single-jumbo-wrapper">
    <div class="faqs-title">
        <h2>Code of Conduct</h2>
        <div class="faqs-green-div"></div>
    </div>
</div>

<section class="single-page-text">
    <div class="container">
        <div class="white-wrap">
            <div class="conducts">
                <p>All attendees, speakers, sponsors and volunteers at our conference are required to agree with the following code of conduct. Organisers will enforce this code throughout the event. We are expecting cooperation from all participants to help ensuring a safe environment for everybody.
                    If you have any questions, or are harassed in any way, please contact someone of the staff. All reports are confidential. Our email address is: <strong>hi-at-laravelnigeria-dot-com</strong>.</p>

                <p>Our conference is dedicated to providing a harassment-free conference experience for everyone, regardless of gender, gender identity and expression, age, sexual orientation, disability, physical appearance, body size, race, ethnicity, or religion (or lack thereof). We do not tolerate harassment of conference participants in any form.</p>

                <p>Sexual language and imagery is not appropriate for any conference venue, including talks, workshops, parties, Twitter and other online media. Conference participants violating these rules may be sanctioned or expelled from the conference at the discretion of the conference organisers.</p>

                <p>Harassment includes offensive verbal comments related to gender, age, sexual orientation, disability, physical appearance, body size, race, ethnicity, religion, sexual images in public spaces, deliberate intimidation, stalking, following, harassing photography or recording, sustained disruption of talks or other events, inappropriate physical contact, and unwelcome sexual attention.</p>

                <p>Participants asked to stop any harassing behaviour are expected to comply immediately. Sponsors are also subject to the anti-harassment policy. In particular, sponsors should not use sexualised images, activities, or other material. Booth staff (including volunteers) should not use sexualised clothing/uniforms/costumes, or otherwise create a sexualised environment.</p>

                <p>If a participant engages in harassing behaviour, the conference organisers may take any action they deem appropriate, including warning the offender or expulsion from the conference with no refund.</p>

                <p>If you are being harassed, notice that someone else is being harassed, or have any other concerns, please report immediately. Here is what you can do:</p>

                <ul>
                    <li>Contact a member of conference staff immediately. Conference staff can be identified as they'll be wearing branded t-shirts.</li>
                    <li>Send a Direct Message on <a href="https://twitter.com/laravelnigeria" title="Laravel Nigeria on Twitter">Twitter</a>.</li>
                    <li>Email <strong>hi-at-laravelnigeria-dot-com</strong> with the email subject taking this format “CoC Violation: I was insulted and called names”.</li>
                </ul>

                <p>Conference staff will be happy to help participants contact hotel/venue security or local law enforcement, provide escorts, or otherwise assist those experiencing harassment to feel safe for the duration of the conference. If you would like to get an update on your report, you can indicate and we will reach out once we have taken all necessary actions to ensure you are safe. We value your attendance.</p>

                <p>We expect participants to follow these rules at conference and workshop venues and conference-related social events.</p>

                <p><em>Original Code of Conduct source and credit: <a href="https://laracon.eu">Laracon.eu</a>. This work is licensed under a Creative Commons Attribution 3.0 Unported License</em></p>
            </div>
        </div>
    </div>
</section>


@include('partials.footer', ['hide' => ['last_conference', 'sponsors']])

@endsection
