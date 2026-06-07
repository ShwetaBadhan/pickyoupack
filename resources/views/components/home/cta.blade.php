<!-- QUOTE FORM -->
<div class="quote-strip" id="quote">
  <div class="container-wide">
    <h3 style="font-family:'Merriweather',serif;font-size:1.5rem;margin-bottom:1rem;">Get a Free Bulk Quote</h3>
    
    {{-- Show validation errors --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form id="quoteForm" class="quote-form">
      @csrf
      <input type="text" name="name" placeholder="Your Name" required />
      <input type="tel" name="phone" placeholder="WhatsApp Number" required />
      <select name="product" required>
        <option value="" disabled selected>Product Needed</option>
        <option value="Corrugated Boxes">Corrugated Boxes</option>
        <option value="Poly Courier Bags">Poly Courier Bags</option>
        <option value="Paper Courier Bags">Paper Courier Bags</option>
        <option value="Carry Bags">Carry Bags</option>
        <option value="Honeycomb Roll">Honeycomb Roll</option>
        <option value="Honeycomb Sleeves">Honeycomb Sleeves</option>
        <option value="Press Bubble Sheet">Press Bubble Sheet</option>
        <option value="Thermal Labels">Thermal Labels</option>
        <option value="Self Adhesive Tapes">Self Adhesive Tapes</option>
        <option value="Stretch Film">Stretch Film</option>
        <option value="Custom Branded">Custom Branded</option>
      </select>
      <input type="number" name="quantity" placeholder="Quantity (units)" min="1" required />
      <button type="submit" id="submitBtn">
        <span class="btn-text">Get Quote</span>
        <span class="spinner d-none">
          <i class="fa fa-spinner fa-spin"></i> Submitting...
        </span>
      </button>
    </form>
  </div>
</div>