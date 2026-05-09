<!-- QUOTE FORM -->
<div class="quote-strip" id="quote">
  <div class="container-wide">
    <h3 style="font-family:'Merriweather',serif;font-size:1.5rem;margin-bottom:1rem;">Get a Free Bulk Quote</h3>
    <form class="quote-form" onsubmit="event.preventDefault(); alert('Thank you! Our team will contact you shortly.');">
      <input type="text" placeholder="Your Name" required />
      <input type="tel" placeholder="WhatsApp Number" required />
      <select required>
        <option value="" disabled selected>Product Needed</option>
        <option>Corrugated Boxes</option>
        <option>Poly Courier Bags</option>
        <option>Paper Courier Bags</option>
        <option>Carry Bags</option>
        <option>Honeycomb Roll</option>
        <option>Honeycomb Sleeves</option>
        <option>Press Bubble Sheet</option>
        <option>Thermal Labels</option>
        <option>Self Adhesive Tapes</option>
        <option>Stretch Film</option>
        <option>Custom Branded</option>
      </select>
      <input type="number" placeholder="Quantity (units)" required />
      <button type="submit">Get Quote</button>
    </form>
  </div>
</div>

<!-- FINAL CTA -->
<section class="final-cta-section">
  <div class="container-wide">
    <h2>Your Next 1,000 Shipments Start Here.</h2>
    <p>Join 3,000+ brands who trust PickYourPack for bulk packaging that never lets them down.</p>
    <div class="cta-cluster">
      <a href="#quote" class="btn-gold">Get a Free Quote</a>
      <a href="tel:+919999608930" class="btn-ghost"><img src="{{ url('assets/imgs/phone-call.png') }}" alt=""> Call:+91 9999608930</a>
      <a href="https://wa.me/919999608930" class="btn-ghost"><img src="{{ url ('assets/imgs/whatsapp.png')}}" alt=""> WhatsApp Us</a>
    </div>
  </div>
</section>