const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

(async () => {
    let browser;
    try {
        const url = process.argv[2];
        if (!url) {
            console.error("Thiếu URL để cào dữ liệu.");
            process.exit(1);
        }

        browser = await puppeteer.launch({ headless: "new" });
        const page = await browser.newPage();
        await page.goto(url, { waitUntil: 'networkidle2' });
        await page.waitForTimeout(2000);

        const content = await page.content();
        const filePath = path.join(__dirname, '../tmp/page.html');

        if (!fs.existsSync(path.dirname(filePath))) {
            fs.mkdirSync(path.dirname(filePath), { recursive: true });
        }

        fs.writeFileSync(filePath, content);
        console.log("Đã lưu HTML vào " + filePath);

        await browser.close();
        process.exit(0);
    } catch (error) {
        console.error("Lỗi trong quá trình Puppeteer chạy: ", error.message);
        if (browser) {
            await browser.close();
        }
        process.exit(1);
    }
})();