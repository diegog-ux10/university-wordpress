import $ from "jquery";

class Search {
  constructor() {
    this.addSearchHtml();
    this.resultsDiv = $("#search-overlay__results");
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.searchField = $("#search-term");
    this.events();
    this.isOverlayIsOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
  }

  events() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    $(document).on("keydown", this.keyPressDispatcher.bind(this));
    this.searchField.on("keyup", this.typingLodic.bind(this));
  }

  typingLodic() {
    if (this.searchField.val() != this.previousValue) {
      clearTimeout(this.typingTimer);

      if (this.searchField.val()) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.html('<div class="spinner-loader"></div>');
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750);
      } else {
        this.resultsDiv.html("");
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.searchField.val();
  }

  getResults() {
    $.when(
      $.getJSON(
        `${
          universityData.root_url
        }/wp-json/wp/v2/posts?search=${this.searchField.val()}`
      ),
      $.getJSON(
        `${
          universityData.root_url
        }/wp-json/wp/v2/pages?search=${this.searchField.val()}`
      )
    ).then(
      (posts, pages) => {
        var combineResults = posts[0].concat(pages[0]);
        this.resultsDiv.html(`
          <h2 class="search-overlay_section-title">General</h2>
          ${
            combineResults.length
              ? '<ul class="link-list min-list">'
              : "<p>No matching Results</p>"
          }
            ${combineResults.map(
              (searchResult) =>
                `<li><a href="${searchResult.link}">${searchResult.title.rendered}</a></li>`
            )}
          ${combineResults.length ? "</ul>" : ""}
        `);
        this.isSpinnerVisible = false;
      },
      (error) => {
        this.resultsDiv.html("<p>Unexpected error; please try again</p>");
      }
    );
  }

  keyPressDispatcher(event) {
    if (
      event.keyCode == 83 &&
      !this.isOverlayIsOpen &&
      !$("input, textarea").is(":focus")
    ) {
      this.openOverlay();
    }
    if (event.keyCode == 27 && this.isOverlayIsOpen == true) {
      this.closeOverlay();
    }
  }

  openOverlay() {
    this.searchOverlay.addClass("search-overlay--active");
    $("body").addClass("body-no-scroll");
    setTimeout(() => this.searchField.focus(), 301);
    this.searchField.val("");
    this.isOverlayIsOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    $("body").removeClass("body-no-scroll");
    this.isOverlayIsOpen = false;
  }

  addSearchHtml() {
    $("body").append(`
    <div class="search-overlay">
      <div class="seach-overlay__top">
        <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input autocomplete="off" type="text" class="search-term" placeholder="What are you looking for?"
                id="search-term">
            <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
        </div>
      </div>
      <div class="container">
        <div id="search-overlay__results">

        </div>
      </div>
    </div>
    `);
  }
}

export default Search;
