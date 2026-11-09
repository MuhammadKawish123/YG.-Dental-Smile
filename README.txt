YG Dental Smile website
=======================
Files
- index.html        the full website (open directly in a browser)
- form-handler.php  emails booking requests to ysygamboa23@yahoo.com

Setup
1. Upload both files to the same folder on your hosting.
2. The booking form posts to form-handler.php, which needs PHP hosting with mail() enabled.
   On static hosting (GitHub Pages, Netlify) PHP will not run. There, set FORM_ENDPOINT in
   index.html to a Formspree URL, or "" to use WhatsApp only. The WhatsApp button always shows.
3. AI video: set VIDEO_SRC in index.html to your video file path (e.g. "hero.mp4").
4. Replace the sample reviews and placeholder before/after images with real ones.
