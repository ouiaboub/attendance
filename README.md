# Mastering AI Prompting: From Beginner to Advanced Real-World Applications

**A Complete Practical Guide for Developers, Freelancers, and Digital Entrepreneurs**

---

> *This book is built on one principle: prompts are products. A well-engineered prompt is a reusable asset that saves hours, generates revenue, and scales your work. Everything here is designed to be used immediately.*

---

## Table of Contents

### PART 1 — Foundations
1. What AI Models Actually Do
2. Anatomy of a High-Quality Prompt
3. Common Mistakes and Why Prompts Fail

### PART 2 — Core Prompting Techniques
4. Role Prompting
5. Context Injection
6. Constraint-Based Prompting
7. Output Formatting (Tables, JSON, Structured Data)
8. Iterative Prompting and Refinement

### PART 3 — Real-World Use Cases
9. Building a Website Chatbot
10. Generating SEO Content at Scale
11. Automating Customer Support
12. Writing High-Converting Marketing Copy
13. Code Generation (Laravel / Next.js / APIs)
14. Data Extraction and Structuring

### PART 4 — Prompt Template Library
15. 50+ Ready-to-Use Prompt Templates

### PART 5 — Advanced Strategies
16. Multi-Step Prompting Workflows
17. Prompt Chaining
18. Building AI Agents
19. Combining Prompts with APIs

---

---

# PART 1 — FOUNDATIONS

---

## Chapter 1: What AI Models Actually Do

You don't need a PhD in machine learning to use AI effectively. But you do need to understand one fundamental truth:

**AI models are next-token prediction engines trained on human-generated text.**

That's it. When you send a prompt, the model isn't "thinking" the way humans do. It's calculating the most statistically likely continuation of your input, based on patterns learned from billions of documents.

### What This Means for Prompting

**1. Context is everything.**
The model has no memory between sessions. It only knows what you put in the prompt. If you want it to act like an expert, you have to establish that context explicitly.

**2. The model follows the path of least resistance.**
Without clear direction, it defaults to generic, safe, middle-of-the-road responses. Specific prompts produce specific outputs.

**3. The model mirrors your tone and structure.**
Write sloppily, get sloppy output. Write with precision and structure, get precise, structured output.

**4. More context = better results (up to a point).**
Providing background, constraints, examples, and format instructions dramatically improves output quality.

### How the Model "Reads" Your Prompt

Think of the model as a highly trained editor reading your brief. It asks:
- *What role should I play here?*
- *What is the goal of this output?*
- *Who is the audience?*
- *What format is expected?*
- *What should I include or avoid?*

If your prompt doesn't answer these questions, the model guesses. And guesses produce mediocre output.

### Temperature and Output Variation

Most AI interfaces have a "temperature" or "creativity" setting (even if hidden). Low temperature = more deterministic, consistent output. High temperature = more creative, varied, sometimes unpredictable.

For tasks like code generation, data extraction, and structured output: **use low temperature.**
For tasks like brainstorming, creative writing, and ideation: **higher temperature works well.**

### Key Takeaway

Every prompt you write is a mini-specification document. Treat it that way. The more precisely you specify the role, task, context, constraints, and format — the more precisely the model delivers.

---

## Chapter 2: Anatomy of a High-Quality Prompt

Every high-performing prompt contains some combination of these six components:

```
[ROLE] + [CONTEXT] + [TASK] + [CONSTRAINTS] + [FORMAT] + [EXAMPLES]
```

You don't always need all six. But knowing each component — and when to include it — is what separates effective prompting from trial and error.

---

### Component 1: ROLE

Tell the model who it is. This primes the model to draw on relevant knowledge and adopt the right tone.

```
You are a senior Laravel developer with 10 years of experience building SaaS applications.
```

```
You are an expert copywriter who specializes in high-converting e-commerce product pages.
```

```
You are a customer support specialist for a B2B software company. You are professional, empathetic, and solution-focused.
```

**Why it works:** The model has been trained on text written by many types of professionals. Specifying a role activates the most relevant knowledge clusters.

---

### Component 2: CONTEXT

Give the model the background it needs. This includes what you're working on, who the audience is, and relevant constraints.

```
I am building a SaaS tool for freelance designers. The target audience is creative professionals aged 25–40 who are comfortable with software but not developers.
```

```
This is for a law firm's internal knowledge base. Responses must be accurate, formal, and free of legal advice disclaimers since this is for internal staff, not clients.
```

---

### Component 3: TASK

State exactly what you want. Use an action verb. Be specific.

❌ Weak: `Write something about my product.`
✅ Strong: `Write a 150-word product description for a mobile app that helps freelancers track invoices. The tone should be confident and results-focused.`

---

### Component 4: CONSTRAINTS

Tell the model what NOT to do, what limits apply, and any non-negotiables.

```
Do not use bullet points. Write in flowing paragraphs.
Keep the response under 300 words.
Do not include any technical jargon.
Do not mention competitor products.
```

Constraints are often the most important component — they prevent the model from defaulting to generic patterns.

---

### Component 5: FORMAT

Specify the exact output structure you want.

```
Return your response as a JSON object with these keys: title, meta_description, body, cta.
```

```
Structure the output as:
- H1 Headline
- 3-sentence subheadline
- 5 bullet points with benefits
- Call to action
```

```
Use a Markdown table with columns: Feature | Basic Plan | Pro Plan | Enterprise Plan
```

---

### Component 6: EXAMPLES (Few-Shot)

Providing 1–3 examples of the output you want is the single most powerful technique for improving quality.

```
Here is an example of the format I want:

INPUT: "Project management software"
OUTPUT: "Stop drowning in deadlines. Our project management software gives your team one place to plan, track, and ship — on time, every time."

Now do the same for: "Invoice tracking app for freelancers"
```

---

### The Complete Prompt Formula

Here's what a fully assembled high-quality prompt looks like:

```
You are an expert e-commerce copywriter with 8 years of experience writing for Shopify stores.

CONTEXT:
I run a Shopify store selling premium handmade leather wallets. My customers are men aged 30–50 who value quality, craftsmanship, and minimal design. Average order value is $120.

TASK:
Write a product description for our "Slim Carry" bifold wallet.

CONSTRAINTS:
- Maximum 200 words
- No buzzwords like "innovative" or "revolutionary"
- Do not use bullet points — use short, punchy paragraphs
- Mention the 5-year warranty naturally (don't start a sentence with "It comes with...")

FORMAT:
- One headline (under 10 words)
- Two paragraphs of body copy
- One closing sentence CTA

PRODUCT DETAILS:
- Full-grain vegetable-tanned leather
- Holds 6 cards + cash
- Handstitched in Portugal
- Available in cognac and black
- 5-year manufacturer warranty
```

This prompt will produce dramatically better results than "write a product description for my leather wallet."

---

## Chapter 3: Common Mistakes and Why Prompts Fail

Most failed prompts fall into one of these categories. Recognizing them is half the battle.

---

### Mistake 1: Vagueness

**Bad prompt:**
```
Write a marketing email.
```

**Why it fails:** The model doesn't know the product, audience, goal, tone, length, or CTA. It defaults to a generic template.

**Fix:** Add role, context, product details, audience, and format.

---

### Mistake 2: No Format Instructions

**Bad prompt:**
```
Give me 10 ideas for blog posts about productivity.
```

**Why it fails:** The model might write 10 sentences, 10 paragraphs, or a mixed format. You have no control over what you get.

**Fix:**
```
Give me 10 blog post ideas about productivity for remote developers. Format as a numbered list. For each idea, include: Title | Target keyword | One-sentence summary.
```

---

### Mistake 3: Asking Too Many Things at Once

**Bad prompt:**
```
Write a landing page, suggest 5 keywords, create a meta description, write 3 email subject lines, and suggest a Facebook ad copy for my new course on Python programming.
```

**Why it fails:** The model's quality degrades when juggling too many tasks simultaneously. Output becomes shallow.

**Fix:** Break into separate prompts, or sequence them explicitly.

---

### Mistake 4: Not Providing Enough Context

**Bad prompt:**
```
Make this email better.
[pasted email]
```

**Why it fails:** "Better" is undefined. Better for what goal? Better in what way? More formal? More persuasive?

**Fix:**
```
Rewrite this email to be more persuasive. The goal is to get the recipient to schedule a 20-minute demo call. The recipient is a busy VP of Marketing at a mid-sized e-commerce company. Keep it under 150 words and end with a single, low-friction CTA.
[pasted email]
```

---

### Mistake 5: Accepting the First Output

Most first-pass outputs are 70% of the way there. The remaining 30% comes from refinement. Treat AI like a junior writer — the first draft is raw material, not the final product.

**Fix:** Use follow-up prompts:
```
Good. Now make the opening line more attention-grabbing. The current version is too generic.
```
```
Rewrite paragraph 2 to focus more on ROI rather than features.
```

---

### Mistake 6: Fighting the Model's Defaults

Some tasks have strong defaults baked in. If you ask for a "list of ideas," you'll get bullet points. If you ask for an "essay," you'll get 5 paragraphs. Fighting these defaults requires explicit instructions.

**Fix:** Always specify format. If you want something non-standard, say so explicitly.

---

### Mistake 7: Over-Complicating the Prompt

There's a difference between a well-structured prompt and an overwhelming one. If you write 20 constraints and 6 examples, the model may start to lose track of the most important instructions.

**Fix:** Prioritize. Put the most important instructions first. Keep the prompt focused on one core output.

---

### Mistake 8: Ignoring Negative Instructions

Telling the model what NOT to do is often more effective than telling it what to do.

```
Do not use passive voice.
Do not start any sentence with "I".
Do not include disclaimers or hedging language.
Do not use the words "leverage," "synergy," or "innovative."
```

---

### Cheat Sheet: Prompt Failure Diagnosis

| Symptom | Likely Cause | Fix |
|---|---|---|
| Output is too generic | No role or context | Add role + context |
| Output is too long/short | No length constraint | Specify word/sentence count |
| Wrong format | No format instructions | Add explicit format spec |
| Missing key information | Didn't provide background | Add context block |
| Output is unfocused | Too many tasks | Split into separate prompts |
| Wrong tone | No tone instruction | Specify tone explicitly |
| Hallucinated facts | Model filling gaps | Provide facts; use verification prompts |

---

---

# PART 2 — CORE PROMPTING TECHNIQUES

---

## Chapter 4: Role Prompting

**The Concept:**
Role prompting assigns the model a specific persona, expertise level, or professional identity before it completes a task. It's the most universally applicable technique in prompting.

**Why it works:** Language models have been trained on text written by lawyers, doctors, developers, marketers, and thousands of other specialists. Activating a specific role primes the model to use domain-appropriate language, reasoning patterns, and output structures.

---

### Bad Example

```
Write a privacy policy for my app.
```

**Output problem:** Generic, legally vague, probably unusable.

---

### Improved Example

```
You are a technology lawyer who specializes in SaaS products and data privacy law (GDPR, CCPA). You have written privacy policies for over 50 software products.

Write a comprehensive but readable privacy policy for a mobile app that:
- Collects user email, name, and usage analytics
- Stores data on AWS servers in the US
- Allows users to delete their accounts and data
- Does not sell data to third parties

The policy should be written in plain English while remaining legally sound. Use numbered sections. Include: Data Collection, How We Use Data, Data Storage, Third-Party Sharing, User Rights, and Contact Information.
```

**Output:** Structured, legally credible, plain-English privacy policy — usable as a starting draft.

---

### Role Prompting Templates

**For technical tasks:**
```
You are a senior [language] developer with [X] years of experience specializing in [domain]. You write clean, maintainable, well-documented code.
```

**For content tasks:**
```
You are a professional [type] copywriter who specializes in [industry/niche]. Your writing is [tone: direct/conversational/authoritative] and focused on [goal: conversions/education/engagement].
```

**For analysis tasks:**
```
You are a [industry] consultant with expertise in [specific area]. You think analytically, back statements with logic, and give direct recommendations without hedging.
```

**For customer-facing tasks:**
```
You are a friendly, professional customer support specialist for [company type]. You are solution-focused, empathetic, and represent the brand positively in every response.
```

---

### When to Use Role Prompting

- **Always** when quality and domain accuracy matter
- Anytime you need output that sounds like it came from a specific type of professional
- When default outputs are too generic or miss domain-specific nuances
- When tone needs to be consistent and professional

---

### Advanced Role Stacking

You can assign multiple roles for tasks that span disciplines:

```
You are both a UX designer and a conversion rate optimization specialist. You understand both how users interact with interfaces AND what drives purchase decisions. Review the following landing page copy and suggest 5 improvements.
```

---

## Chapter 5: Context Injection

**The Concept:**
Context injection is the practice of providing the model with all the relevant background information it needs before issuing a task. This is especially critical for tasks that are specific to your business, your audience, or your product.

**The core problem it solves:** The model doesn't know your business. Without context, it guesses. Context injection replaces guessing with precision.

---

### Bad Example

```
Write a welcome email for new users.
```

**Output problem:** Generic "Welcome to [Product]!" email that could belong to any company.

---

### Improved Example

```
CONTEXT:
- Product: Writepath — an AI-powered writing assistant for non-native English speakers
- Target user: Professionals in Southeast Asia who write business emails and reports in English
- Tone: Warm, encouraging, professional (not overly casual)
- Key value prop: Writepath learns your writing style and helps you communicate with confidence
- CTA goal: Get the user to complete their first writing task within the app
- Email length: 180–220 words

TASK:
Write a welcome email for new Writepath users. This is the first email they receive after signing up.

The email should:
1. Welcome them warmly
2. Quickly remind them of the core benefit
3. Give them one clear first action to take
4. End with an encouraging, motivating close
```

**Output:** A branded, specific, action-driving welcome email — ready to use with minor personalization.

---

### Types of Context to Inject

**Business Context:**
```
Company: [Name]
Industry: [Industry]
Product/Service: [Description]
Target audience: [Demographics, pain points]
Brand tone: [Adjectives]
Competitors to avoid mentioning: [Names]
```

**Audience Context:**
```
Reader profile: [Job title, experience level, goals]
Their primary pain point: [Specific problem]
What they already know: [Assumed knowledge]
What they don't know: [Knowledge gaps to bridge]
```

**Technical Context:**
```
Existing codebase: [Language, framework, patterns used]
Constraints: [Performance requirements, API limits, security rules]
Related code: [Paste relevant snippets]
```

**Creative Context:**
```
Brand voice: [3–5 adjectives]
Topics to avoid: [Sensitive areas]
Required mentions: [Keywords, features, offers]
Previous examples: [Link to or paste examples]
```

---

### The Context Block Pattern

For complex tasks, use a structured "context block" at the top of your prompt:

```
=== CONTEXT ===
[All background information here]

=== TASK ===
[What you want]

=== CONSTRAINTS ===
[What to do/avoid]

=== FORMAT ===
[How to structure the output]
```

This structured approach is especially powerful when building reusable prompt templates for teams.

---

### When to Use Context Injection

- Any time the output needs to be specific to your brand, product, or audience
- When you're using the same tool repeatedly (build a "context block" you paste in every time)
- For technical tasks where the model needs to know your stack or architecture
- For content tasks where tone and audience consistency matter

---

## Chapter 6: Constraint-Based Prompting

**The Concept:**
Constraints are instructions that narrow the model's output space. They define what the model must do, must not do, and the limits within which it should operate.

Most people underuse constraints. As a result, their outputs are verbose, unfocused, or misaligned with the actual goal.

---

### Bad Example

```
Explain how REST APIs work.
```

**Output problem:** A 600-word explanation ranging from basic HTTP to advanced pagination, written at an unclear level, with no particular audience or application in mind.

---

### Improved Example

```
Explain how REST APIs work.

CONSTRAINTS:
- Audience: Junior developers who understand basic JavaScript but have never built or consumed an API
- Length: Maximum 300 words
- Do not explain HTTP methods beyond GET and POST — that comes in a later lesson
- Use one concrete, real-world analogy
- End with a single "what to learn next" sentence
- Write in second person ("you")
```

**Output:** Focused, appropriate, exactly the right length and scope.

---

### Types of Constraints

**Length constraints:**
```
Maximum 150 words.
Exactly 3 paragraphs.
Under 280 characters (for Twitter).
No more than 5 bullet points.
```

**Tone/style constraints:**
```
Write in active voice only.
No passive constructions.
Professional but not academic.
Use short sentences (under 20 words each).
No jargon — assume a non-technical reader.
```

**Content constraints:**
```
Do not mention pricing.
Do not compare to competitors.
Only include information that is relevant to [specific feature].
Do not include disclaimers or legal hedging.
Focus only on the benefits, not the technical implementation.
```

**Format constraints:**
```
Do not use bullet points.
Do not use headers.
Output only the final product — no explanation or meta-commentary.
Return only the JSON object — no prose.
```

---

### The "No Meta-Commentary" Constraint

One of the most useful constraints:

```
Return only the output. Do not include any explanation, preamble, or notes about what you did.
```

By default, models often start with "Certainly! Here's the email you requested..." or end with "Let me know if you'd like any changes!" These filler phrases add no value and break automated workflows.

---

### Negative Constraints: What NOT to Do

Negative constraints are often more powerful than positive ones:

```
Do not use any of the following words: "leverage," "synergy," "innovative," "cutting-edge," "seamless," "game-changer."
Do not start any sentence with "I."
Do not use rhetorical questions.
Do not include statistics you are not certain of.
Do not give general advice — be specific and actionable.
```

---

### When to Use Constraint-Based Prompting

- When default outputs are too long, too vague, or off-tone
- When building templates that will be reused (constraints ensure consistency)
- When automating outputs (constraints make parsing and processing more reliable)
- When the audience has very specific needs (e.g., "for a 10-year-old" or "for a C-suite executive")

---

## Chapter 7: Output Formatting

**The Concept:**
Output formatting instructs the model to deliver its response in a specific structure. This is critical for automation, integration, and professional presentation.

The model can output: plain text, Markdown, JSON, XML, HTML, CSV, tables, code blocks, and custom schemas — if you ask explicitly.

---

### Bad Example

```
List the pros and cons of using PostgreSQL vs MySQL.
```

**Output problem:** A wall of prose or an inconsistent list that's hard to scan or parse.

---

### Improved Example

```
Compare PostgreSQL and MySQL across these dimensions: Performance, Scalability, JSON Support, Full-Text Search, and Licensing.

Return the comparison as a Markdown table with columns: Feature | PostgreSQL | MySQL | Winner.

After the table, add a 2-sentence summary recommendation based on a use case where someone is building a SaaS application.
```

---

### JSON Output (Critical for Automation)

When building AI-powered tools, you need structured, parseable output. Always use JSON formatting prompts.

```
Extract the following information from the job posting below and return it as a JSON object.

Required JSON structure:
{
  "job_title": "",
  "company": "",
  "location": "",
  "remote": true/false,
  "salary_min": null or number,
  "salary_max": null or number,
  "required_skills": [],
  "nice_to_have_skills": [],
  "experience_years": null or number,
  "application_deadline": null or "YYYY-MM-DD"
}

Rules:
- Return ONLY the JSON object. No prose, no code blocks, no explanation.
- If a field is not mentioned, use null for strings/numbers and [] for arrays.
- All string values should be in lowercase.

JOB POSTING:
[paste job posting here]
```

---

### Structured Report Format

```
Write a competitive analysis report for [company].

Use this exact structure:

# Competitive Analysis: [Company Name]
**Date:** [Today's date]
**Prepared for:** [Audience]

## Executive Summary
[3 sentences]

## Market Position
[2 paragraphs]

## Key Strengths
[Bulleted list, 4–6 items]

## Key Weaknesses
[Bulleted list, 3–5 items]

## Opportunities
[Bulleted list, 3–4 items]

## Threats
[Bulleted list, 3–4 items]

## Recommendation
[1 paragraph, direct and specific]
```

---

### CSV Output for Data Processing

```
I have the following list of product descriptions. For each one, extract: product name, category, price (if mentioned), and key features.

Return the results as CSV with a header row:
product_name,category,price,key_features

Separate multiple features with a semicolon. If a field is not mentioned, use N/A.

PRODUCTS:
[paste products here]
```

---

### Custom Code Block Formatting

```
Write a Python function that [description].

Requirements:
- Use type hints
- Include a docstring in Google format
- Add inline comments for non-obvious logic
- Include at least one usage example in a __main__ block

Return the code only. No explanation before or after the code block.
```

---

### When to Use Output Formatting

- **Always** when the output will be used in a tool, pipeline, or integration
- When you need to parse or process the output programmatically
- When creating templates for team use (consistent format reduces friction)
- When presenting information to clients or stakeholders
- When generating content at scale (consistent format = easier post-processing)

---

## Chapter 8: Iterative Prompting and Refinement

**The Concept:**
Iterative prompting is the practice of treating AI output as a draft, not a final product — and using follow-up prompts to refine, expand, correct, and improve it.

Most people stop at the first output. The best prompt engineers know that the first output is the starting point. Refinement is where the value is created.

---

### Bad Approach

Prompt → Unhappy with output → Start over with a new prompt.

This is inefficient. The model has already processed your context. Use that to your advantage.

---

### Good Approach: The Refinement Loop

```
PROMPT 1 (Generate):
Write a LinkedIn post about [topic].

PROMPT 2 (Critique):
Now critique the post you just wrote. What are its weakest elements? What could be stronger?

PROMPT 3 (Improve):
Rewrite the post addressing those weaknesses. Make the opening line more attention-grabbing and remove the generic closing.

PROMPT 4 (Variant):
Now write two alternative versions. Version A should be more personal/storytelling-driven. Version B should be more data-driven and professional.

PROMPT 5 (Final):
Take the strongest elements of Version A and Version B and combine them into one final, polished version.
```

---

### Refinement Command Vocabulary

Keep these in your toolkit:

**For tightening:**
```
Remove all filler language and redundancy. Make every sentence earn its place.
```

**For tone adjustment:**
```
The current version is too formal. Rewrite in a warmer, more conversational tone while keeping the same structure.
```

**For focus:**
```
The second paragraph loses focus. Rewrite it to stay on the theme of [specific theme].
```

**For specificity:**
```
The current version is too generic. Make it more specific to [audience/context/use case].
```

**For impact:**
```
The opening is too weak. Give me 5 alternative first sentences that are more direct and attention-grabbing.
```

**For structure:**
```
Restructure this so the most important point comes first, not last.
```

---

### Self-Review Prompting

One of the most powerful iterative techniques — ask the model to critique its own output before you do:

```
Before I review this, critique it yourself. Score it on:
1. Clarity (1–10): Does it say what it means?
2. Specificity (1–10): Is it too generic?
3. Persuasiveness (1–10): Would the target audience be moved to act?
4. Format (1–10): Is the structure appropriate for the use case?

After scoring, identify the 2 things you'd improve, then rewrite with those improvements applied.
```

---

### Comparative Iteration

```
Generate 3 different versions of this [email/headline/description]:
- Version 1: Optimized for clarity
- Version 2: Optimized for emotional impact
- Version 3: Optimized for brevity (under 50 words)

Then tell me which version is best for [specific goal] and why.
```

---

### Locking Good Elements

When part of the output is good but part needs work:

```
The headline is perfect — keep it exactly as is. Rewrite only the body copy to be more specific and action-oriented.
```

---

### When to Use Iterative Prompting

- Complex creative tasks (landing pages, email sequences, sales copy)
- Any output that will be published or sent to clients
- When you need to explore multiple directions before committing
- When the first output is "almost right" but not quite there
- When training yourself or your team to recognize quality outputs
---

---

# PART 3 — REAL-WORLD USE CASES

---

## Chapter 9: Building a Website Chatbot

### Problem Description

You want to build a customer-facing chatbot for a website that can answer product questions, handle basic support, and guide users toward conversion — without requiring a developer to manually script every possible conversation flow.

The challenge: the chatbot needs to stay on-topic, represent your brand consistently, handle edge cases gracefully, and escalate appropriately when it can't help.

---

### The System Prompt (Core Chatbot Prompt)

This is the prompt you use to configure the chatbot's behavior. It's injected as the "system message" in your AI API call.

```
You are Aria, the virtual assistant for Stackflow — a project management SaaS platform for remote development teams.

YOUR ROLE:
You help website visitors understand Stackflow's features, pricing, and value proposition. You guide interested visitors toward booking a demo or starting a free trial. You handle basic support questions from existing customers.

YOUR PERSONALITY:
- Friendly and professional, but not overly casual
- Concise — you never write walls of text
- Helpful — you always try to answer the question before asking a follow-up
- Brand-positive — you are enthusiastic about Stackflow without being pushy

KNOWLEDGE BASE:
- Stackflow plans: Starter ($29/mo, up to 5 users), Professional ($79/mo, up to 20 users), Enterprise (custom pricing)
- All plans include: task tracking, GitHub integration, time tracking, and reporting
- Professional adds: client portal, custom workflows, priority support
- Enterprise adds: SSO, dedicated account manager, SLA guarantee
- Free trial: 14 days, no credit card required
- Main competitors: Jira, Asana, Linear
- Unique advantages: Built specifically for dev teams, native GitHub/GitLab integration, automatic sprint velocity tracking

RULES:
1. Keep responses under 100 words unless the user asks for detailed information
2. If asked about pricing, always mention the free trial first
3. If a user seems frustrated, empathize first, then solve
4. If you don't know something, say: "That's a great question — let me connect you with our team for the most accurate answer." Then offer: "Would you like to chat live, send us an email, or book a quick call?"
5. Never make up features or pricing not listed above
6. Never mention competitors negatively
7. If a user asks a question outside your knowledge (e.g., detailed legal/compliance questions), escalate gracefully

ESCALATION TRIGGER:
If the user asks anything you cannot answer confidently, or expresses strong frustration, say: "I want to make sure you get the right answer on this — can I connect you with a member of our team?"
```

---

### Example Conversation Flow

**Visitor:** "What makes Stackflow different from Jira?"

**Aria (output):**
> Great question! While Jira is a powerful general-purpose tool, Stackflow was built from the ground up for development teams. The biggest differences:
>
> - Native GitHub/GitLab integration with automatic sprint sync
> - Automatic velocity tracking — no manual setup
> - Cleaner interface designed for devs, not project managers
>
> Most teams switch from Jira and get set up in under an hour. Want to try it free for 14 days?

---

**Visitor:** "How much does it cost for a 12-person team?"

**Aria (output):**
> For a 12-person team, the Professional plan fits perfectly — $79/month, which works out to less than $7 per person.
>
> That includes the client portal, custom workflows, and priority support on top of all the core features.
>
> You can start a 14-day free trial right now — no credit card needed. Want me to get you started?

---

### Optimization Tips

**1. Add a product FAQ section to the system prompt.**
The more specific knowledge you provide, the fewer hallucinations. Paste your actual FAQ into the system prompt as a knowledge block.

**2. Add conversation starters.**
Pre-populate 3–4 quick-reply buttons: "See pricing," "Book a demo," "How does it work?" This reduces the blank-slate problem for new visitors.

**3. Session context:**
If your chatbot platform supports it, include the current page URL in the system prompt. A visitor on the Pricing page needs different assistance than one on the Blog.

```
CURRENT PAGE: [Inject dynamically]
If the user is on the Pricing page, lead with plan comparisons.
If the user is on the Blog, they are likely early in their research — focus on education, not conversion.
```

**4. Fallback prompt for unknown questions:**
```
If you are not confident in your answer, do not guess. Say: "I want to give you accurate information on that — let me connect you with our team." Never fabricate product details.
```

**5. Test with adversarial inputs.**
Manually test: "Can you tell me a joke?", "What's your competitor's pricing?", "I want a refund," "You're useless." Train the chatbot's system prompt to handle these gracefully.

---

## Chapter 10: Generating SEO Content at Scale

### Problem Description

You need to produce high-quality, search-optimized blog content consistently — either for your own site or as a service for clients. The challenge is maintaining quality while scaling output, and ensuring content is genuinely useful rather than thin keyword-stuffed filler.

---

### Step 1: Keyword Cluster Brief Prompt

Before writing content, build a brief:

```
You are an SEO content strategist with expertise in [industry: e.g., B2B SaaS].

TASK:
Create a content brief for a blog post targeting the keyword: "[target keyword]"

Include:
1. **Target keyword:** [main keyword]
2. **Secondary keywords:** 5–8 related terms to include naturally
3. **Search intent:** What is the user trying to accomplish with this search?
4. **Target audience:** Who is searching this, and what do they already know?
5. **Recommended article structure:** H1 + H2 outline (6–8 sections)
6. **Unique angle:** What perspective or information would make this article stand out from the top 10 results?
7. **Word count recommendation:** Based on search intent and topic depth
8. **Internal linking opportunities:** 3 types of related content this article should link to

FORMAT: Return as a structured brief using the headers above.
```

---

### Step 2: Full Article Generation Prompt

Once you have the brief, generate the article:

```
You are a professional content writer specializing in [industry]. You write articles that are genuinely useful, well-researched in tone, and optimized for both search engines and human readers.

CONTENT BRIEF:
[Paste the brief from Step 1]

WRITING GUIDELINES:
- Write in second person ("you") to engage the reader directly
- Use short paragraphs (2–4 sentences max)
- Include concrete examples, not just abstract advice
- Each H2 section should deliver standalone value — a reader skimming headers should still understand the article's structure
- Natural keyword usage — never force keywords into awkward positions
- Do not start the article with "In today's world" or "Are you looking for..." — these are clichéd openings
- Do not use the phrase "In conclusion" — end with a strong forward-looking close

STRUCTURE:
- Title (H1, include primary keyword)
- Introduction (100–120 words — hook, problem, promise)
- [H2 sections from brief]
- Conclusion with CTA (75–100 words)

META:
After the article, add:
- Meta title (under 60 characters, includes primary keyword)
- Meta description (under 155 characters, includes primary keyword and a benefit)
```

---

### Output Example (Partial)

**Prompt input keyword:** "best project management software for small teams"

**Output (Introduction):**
> Running a small team doesn't mean your projects are small. Missed deadlines, scattered communication, and lost tasks cost you real money — even when you're managing five people, not fifty.
>
> The right project management software changes this. But with dozens of options, most built for enterprise teams, finding one that actually fits a lean, fast-moving team isn't straightforward.
>
> This guide breaks down the seven best tools for small teams, what makes each one worth considering, and the one question you should answer before choosing any of them.

---

### Step 3: Content Refresh Prompt

For updating existing content to maintain rankings:

```
You are an SEO content editor. I'm going to give you an existing blog article and a list of improvements needed.

ARTICLE: [paste existing article]

IMPROVEMENTS NEEDED:
1. The article is 18 months old — update any statistics, tool references, or outdated advice
2. Add a new H2 section on [new topic/angle]
3. The introduction is too slow — rewrite it to get to the value proposition faster
4. Add more specific examples throughout — the current version is too abstract
5. The meta description doesn't include the primary keyword — rewrite it

CONSTRAINTS:
- Do not change the overall structure or remove existing sections
- Keep the word count within 10% of the original
- Match the existing writing style and tone
- Flag any statistics you updated with [UPDATED] so I can verify them
```

---

### Bulk Generation at Scale

For generating 10+ articles efficiently:

```
I am going to give you a list of blog post titles and target keywords. For each one, return:
1. Article outline (H1 + H2s only)
2. Word count recommendation
3. Primary CTA recommendation (what action should the article drive?)

Return as a JSON array with objects: { title, keyword, outline[], word_count, cta }

ARTICLES:
1. "How to Reduce Customer Churn in SaaS" — keyword: "reduce SaaS churn"
2. "Onboarding Emails That Actually Get Read" — keyword: "SaaS onboarding emails"
3. "Product-Led Growth vs Sales-Led Growth" — keyword: "product led growth vs sales led growth"
[continue list]
```

---

### Optimization Tips

**1. Never publish AI content raw.** AI content needs a human review pass for accuracy, brand voice, and unique insights. Add one original insight or data point per article.

**2. Build a "brand voice guide" context block.** Include examples of your best-performing articles. The more examples you provide, the better the model matches your style.

**3. Use real data.** Prompt the model to mark where statistics should go (`[INSERT STAT]`) and fill those in with real, verified data from authoritative sources.

**4. The outline is the product.** Invest time in the content brief and outline. If the structure is right, the article almost writes itself.

---

## Chapter 11: Automating Customer Support

### Problem Description

You want to use AI to handle a significant portion of your customer support volume — specifically the repetitive, predictable queries — while ensuring quality and appropriate escalation.

Use cases: e-commerce returns, SaaS troubleshooting, subscription management, FAQ responses.

---

### Core Support Response Prompt

```
You are a customer support specialist for [Company Name], a [brief description].

YOUR ROLE:
Respond to customer support tickets professionally, helpfully, and empathetically. Your goal is to resolve the customer's issue in a single response wherever possible.

BRAND VOICE: Professional, warm, solution-first. Never defensive. Always acknowledge the customer's frustration before solving.

RESPONSE STRUCTURE (always follow this):
1. Acknowledge (1 sentence — show you understood their issue)
2. Apologize if appropriate (only if the company is at fault)
3. Solve (direct answer or step-by-step instructions)
4. Prevent (if applicable — how to avoid this in future)
5. Close (offer further help + name sign-off)

CONSTRAINTS:
- Maximum 200 words per response
- No jargon or technical terms unless the customer used them first
- Do not promise what you cannot guarantee (e.g., "Your refund will arrive in 2 days")
- Use safe language for timelines: "typically within 3–5 business days"
- Never share other customers' information
- If you cannot resolve: "I've escalated this to our specialized team and you'll hear back within [timeframe]."

ESCALATE IMMEDIATELY for:
- Billing disputes over $500
- Requests to close account
- Legal threats or fraud reports
- Threats or abusive language (respond professionally, then flag)

CUSTOMER TICKET:
[Paste ticket here]
```

---

### Example: Returns Request

**Customer ticket:**
> "I ordered the wrong size. Order #48291. Can I return it? I've had it for 3 weeks."

**Output:**
> Hi there,
>
> Of course — returning the wrong size is completely understandable, and I'm happy to help get this sorted for you.
>
> For order #48291, here's how to initiate your return:
> 1. Visit [returns portal link] and enter your order number
> 2. Select "Wrong size" as the reason
> 3. Print the prepaid return label (valid for 14 days)
>
> Once we receive the item, your exchange or refund will be processed within 3–5 business days.
>
> Note: Our standard return window is 30 days from delivery, so you're within range.
>
> Any other questions? I'm here.
>
> — Maya | Support Team

---

### Ticket Categorization + Routing Prompt

```
You are a customer support routing system. Analyze the following support ticket and return a JSON object with:
{
  "category": "[billing/technical/returns/account/feature_request/abuse/other]",
  "priority": "[low/medium/high/urgent]",
  "sentiment": "[positive/neutral/frustrated/angry]",
  "summary": "[One sentence description of the issue]",
  "suggested_response_type": "[automated/template/human_required]",
  "escalate": true/false,
  "escalation_reason": "[null or reason string]"
}

PRIORITY RULES:
- urgent: legal threats, service outages, data breach concerns, payment failures over $500
- high: account access locked, billing errors, product not working
- medium: feature questions, minor bugs, account settings
- low: general questions, feature requests, positive feedback

Return ONLY the JSON object.

TICKET:
[Paste ticket]
```

---

### Bulk Response Generation

For teams that pre-generate response templates:

```
Generate 5 customer support response templates for the following scenario:

SCENARIO: Customer is unable to log in because they forgot their password, and the password reset email is not arriving.

For each template, vary:
1. Tone (formal vs. casual)
2. Length (short: under 80 words / long: under 200 words)
3. Opening style (empathetic / direct / solution-first)

Label each template clearly. Use [CUSTOMER_NAME], [PRODUCT_NAME], and [SUPPORT_EMAIL] as placeholders.
```

---

### Optimization Tips

**1. Build a knowledge base block.** The better the system prompt's knowledge base, the fewer escalations. Include your top 20 FAQ answers directly in the prompt.

**2. Sentiment detection before responding.** Run a quick sentiment/category analysis (like the routing prompt above) before generating a response. Angry customers need a different opening than curious ones.

**3. A/B test your response templates.** Track resolution rate, reply rate, and CSAT for AI-generated vs. human-generated responses. Most teams find AI handles 60–70% of volume reliably.

**4. Add a "magic phrase" detector.** Include logic to detect trigger phrases like "this is ridiculous," "I'm canceling," or "lawyer" and route those immediately to human agents.

---

## Chapter 12: Writing High-Converting Marketing Copy

### Problem Description

Marketing copy is one of the highest-value applications of AI prompting. A 10% improvement in conversion rate on a $100K/month revenue stream is worth $120K/year. The quality of the prompt directly determines the quality of the copy.

---

### Landing Page Headline Generator

```
You are a direct-response copywriter with 10 years of experience writing landing page headlines for SaaS products. You understand the psychology of conversion: specificity, benefit-first messaging, and emotional resonance.

PRODUCT: [Product name and one-line description]
TARGET CUSTOMER: [Who they are, their primary pain point]
PRIMARY BENEFIT: [The #1 thing this product does for the customer]
TONE: [e.g., confident and direct / warm and approachable / bold and provocative]

Generate 10 headline options using these proven frameworks:
1. Outcome headline: "[Specific outcome] in [timeframe]"
2. Problem → Solution: "[Problem] → [Solution]"
3. Curiosity gap: A statement that creates intrigue
4. Social proof embedded: Headline that implies results others have achieved
5. Specificity headline: Uses a precise number or claim
6. Negative headline: Tells them what they can stop doing
7. Question headline: Asks the exact question the customer is asking themselves
8. "How to" headline: Direct educational promise
9. Comparison headline: Positions against the alternative (without naming it)
10. Bold claim: The most confident, direct version of your value prop

After the 10 options, recommend the top 3 for A/B testing and explain why in one sentence each.
```

---

### Email Subject Line Generator

```
You are an email marketing specialist with expertise in open rate optimization.

CONTEXT:
- Email type: [Welcome / Promotional / Re-engagement / Onboarding / Cart abandonment]
- Product/offer: [Description]
- Target audience: [Who they are]
- Goal: [What action you want them to take]

Generate 15 subject line options across these styles:
- Curiosity (3 options)
- Benefit-driven (3 options)
- Urgency/scarcity (2 options)
- Personalization hook (2 options)
- Question (2 options)
- Number/list (2 options)
- One-word or ultra-short (1 option)

For each subject line, suggest a matching preheader text (under 90 characters).
Format as: Subject line | Preheader

After the list, flag the 3 with the highest projected open rate and explain why.
```

---

### Facebook/Instagram Ad Copy

```
You are a paid social advertising specialist who has managed $2M+ in ad spend. You know how to write scroll-stopping ad copy.

PRODUCT: [Name and description]
TARGET AUDIENCE: [Demographics, interests, pain points]
OFFER: [What you're promoting — free trial, discount, product launch]
OBJECTIVE: [Clicks / Conversions / Awareness]
PLATFORM: [Facebook / Instagram / Both]

Write 3 complete ad variations. Each variation should include:
- Primary text (under 125 characters for Instagram / under 250 for Facebook)
- Headline (under 40 characters)
- Description (under 30 characters)
- CTA button recommendation

VARIATION DIRECTIONS:
- Ad 1: Pain-focused (lead with the problem)
- Ad 2: Outcome-focused (lead with the transformation)
- Ad 3: Social proof/curiosity (lead with a result or surprising fact)

Do not use exclamation points in every sentence. Write like a confident human, not a copywriter trying too hard.
```

---

### Product Description Generator (E-commerce)

```
You are a product copywriter specializing in e-commerce. Your descriptions convert browsers into buyers.

PRODUCT: [Name]
CATEGORY: [e.g., fitness equipment, skincare, home décor]
TARGET CUSTOMER: [Who buys this, why]
KEY FEATURES: [Bullet list of specs/features]
KEY BENEFITS: [What outcomes/feelings does it deliver?]
PRICE POINT: [$X — helps calibrate the premium level of language]
PLATFORM: [Shopify / Amazon / Website]

Write:
1. Short description (under 100 words) — for product card/grid view
2. Long description (200–300 words) — for product page
3. Bullet points for features (6 bullets, benefit-first format: "Feature so you can [benefit]")
4. SEO-optimized product title (include primary keyword naturally)

FORMAT: Return each section with a clear label. No meta-commentary.
```

---

### Example Output (Product Description)

**Input:** Bamboo cutting board, premium kitchenware, home cooks, $65

**Short Description Output:**
> Built for kitchens that take cooking seriously. This bamboo cutting board is 30% harder than maple, self-healing to resist knife marks, and naturally antimicrobial — so it stays cleaner, longer. One board. Every prep task.

**Bullet Points Output:**
> - **Extra-thick 1.5" construction** so it stays stable on any counter without gripping mats
> - **Naturally antimicrobial bamboo** so bacteria doesn't harbor in surface grooves
> - **Self-healing surface** so knife marks disappear and the board looks new longer
> - **Juice groove channels** so liquids stay on the board, not your counter
> - **Reversible design** so you have two working surfaces in one board
> - **Food-safe mineral oil finish** so it's ready to use straight from the box

---

### Optimization Tips

**1. Provide examples of copy you love.** Paste 2–3 examples of headlines or copy you consider excellent. Tell the model why you like them. The model will capture that style.

**2. Use the "Swipe File" technique.** Build a prompt that says: "I'm going to show you 5 high-performing ads in my industry. Analyze what makes them work, then write 3 new ads using those principles for my product."

**3. Test emotional angles.** For the same product, test: fear-based (what happens if they don't buy), aspiration-based (vision of their better self), and logic-based (ROI and specifics). Different audiences respond differently.

---

## Chapter 13: Code Generation (Laravel / Next.js / APIs)

### Problem Description

AI is a force multiplier for developers. Used correctly, it can reduce time spent on boilerplate, documentation, debugging, and standard patterns by 40–60%. The key is giving the model enough context to produce production-ready code, not toy examples.

---

### Laravel: Feature Generation Prompt

```
You are a senior Laravel developer (Laravel 11, PHP 8.3). You write clean, maintainable code following SOLID principles and Laravel best practices.

TASK:
Build a complete subscription management feature for a SaaS application.

REQUIREMENTS:
- User can subscribe to one of three plans: Starter, Professional, Enterprise
- Integration with Stripe (using Laravel Cashier)
- Subscription status stored in users table
- Middleware to restrict access to features based on plan
- Graceful handling of failed payments (webhook)

DELIVERABLES:
1. Migration file for adding subscription fields to users table
2. `SubscriptionController` with methods: subscribe(), upgrade(), cancel(), portal()
3. `SubscriptionMiddleware` that checks plan access
4. Stripe webhook handler for: payment_failed, subscription_updated, subscription_deleted
5. Route definitions (api.php and web.php entries)

CONSTRAINTS:
- Use Form Requests for validation
- Use Jobs for async processing (payment failed notification)
- Include docblocks on all public methods
- Follow RESTful conventions
- Do not use raw SQL — use Eloquent throughout

Return each file separately with a comment header showing the file path.
```

---

### Next.js: Component Generation Prompt

```
You are a senior Next.js developer (Next.js 15, React 19, TypeScript). You write type-safe, performant, accessible components.

TASK:
Build a data table component for displaying user analytics data.

REQUIREMENTS:
- Display columns: User, Email, Plan, MRR, Last Active, Status
- Client-side sorting on all columns
- Search/filter input that filters across all visible columns
- Pagination (10 rows per page, configurable)
- Row click handler (prop: onRowClick(user: User))
- Export to CSV button
- Loading state (skeleton rows)
- Empty state (custom message prop)

TECH STACK:
- Next.js 15 App Router
- TypeScript (strict mode)
- Tailwind CSS for styling
- No external component libraries — build from scratch

CONSTRAINTS:
- Fully accessible (ARIA labels, keyboard navigation)
- Performance: use useMemo for filtered/sorted data
- Mobile responsive (horizontal scroll on small screens)
- TypeScript interfaces for all props and data shapes

Return: DataTable.tsx with all types, hooks, and sub-components in one file. Include a brief usage example in a comment at the top.
```

---

### REST API Design Prompt

```
You are a senior backend architect specializing in RESTful API design.

TASK:
Design a complete REST API for a project management tool.

ENTITIES: Users, Projects, Tasks, Comments, Files

For each entity, define:
1. All endpoints (method + path)
2. Request body schema (JSON)
3. Response schema (JSON)
4. HTTP status codes for success and common errors
5. Authentication requirement (public / user / admin)

ADDITIONAL REQUIREMENTS:
- Include filtering, sorting, and pagination on list endpoints
- Include a bulk operations endpoint for tasks
- Define a webhook system for task status changes
- Include rate limiting headers in responses

FORMAT:
Return as an OpenAPI 3.0 YAML specification, fully documented.
```

---

### Debugging Prompt

```
You are a senior developer doing a code review. Analyze the following code for:
1. Bugs (logic errors, off-by-one errors, null pointer risks)
2. Security vulnerabilities (SQL injection, XSS, CSRF, insecure data handling)
3. Performance issues (N+1 queries, unnecessary re-renders, missing indexes)
4. Code quality issues (naming, complexity, missing error handling)

For each issue found:
- Line number (if applicable)
- Issue type
- Severity: [Critical / High / Medium / Low]
- Explanation of the problem
- Corrected code snippet

CODE:
[paste code]

CONTEXT:
- Framework: [Laravel / Next.js / etc.]
- This code handles: [description of what it does]
- Known issue: [Any specific problem you're investigating, if applicable]
```

---

### Documentation Generator

```
You are a technical writer with deep software development expertise.

Generate complete API documentation for the following code. Format as Markdown suitable for a README or documentation site.

Include:
- Overview (what this code does, 2–3 sentences)
- Prerequisites / Installation
- Authentication (if applicable)
- All endpoints or methods with:
  - Description
  - Parameters (name, type, required, description)
  - Request example (curl)
  - Response example (JSON)
  - Error responses
- Rate limits (if applicable)
- Changelog section (empty placeholder)

CODE:
[paste code or API definition]
```

---

### Test Generation Prompt

```
You are a senior developer who writes thorough, meaningful tests.

Generate a complete test suite for the following [Laravel Feature Test / Jest unit test / Pytest test] code.

REQUIREMENTS:
- Test all happy paths
- Test all error conditions and edge cases
- Test boundary values
- Include at least one integration test
- Mock external dependencies (APIs, databases where appropriate)
- Descriptive test names that explain what is being tested
- Arrange-Act-Assert structure with comments

CODE TO TEST:
[paste code]

FRAMEWORK: [PHPUnit / Jest / Pytest]
COVERAGE TARGET: Aim for 90%+ coverage of the main logic paths.
```

---

### Optimization Tips

**1. Always specify the exact version.**
"Next.js" without a version number is ambiguous. The model has been trained on multiple versions and may default to outdated patterns. Always specify: Next.js 15, Laravel 11, Python 3.12, etc.

**2. Provide your existing code patterns.**
Paste an example of existing code you've written. Tell the model: "Match this code style and patterns." This dramatically improves consistency.

**3. Ask for code review before asking for code.**
For complex features, prompt: "Before writing any code, describe the architecture you would use, potential pitfalls, and alternatives I should consider." Then approve the approach before implementation.

**4. Break large features into prompts.**
Don't ask for an entire authentication system in one prompt. Start with: migrations → models → controllers → routes → tests. Each step builds on the last.

---

## Chapter 14: Data Extraction and Structuring

### Problem Description

Unstructured data — emails, PDFs, web pages, documents — contains valuable information that needs to be extracted, standardized, and structured for processing, analysis, or import into databases.

AI excels at this task when prompted correctly.

---

### Email Data Extraction

```
Extract all structured data from the following email and return it as a JSON object.

REQUIRED FIELDS:
{
  "sender_name": "",
  "sender_email": "",
  "date": "YYYY-MM-DD",
  "subject": "",
  "email_type": "[inquiry/order/complaint/request/other]",
  "urgency": "[low/medium/high]",
  "mentioned_products": [],
  "mentioned_order_numbers": [],
  "requested_action": "",
  "sentiment": "[positive/neutral/negative]",
  "follow_up_required": true/false,
  "follow_up_deadline": "YYYY-MM-DD or null",
  "key_facts": []
}

RULES:
- Return ONLY the JSON. No explanation or commentary.
- If a field cannot be determined, use null.
- For dates, always normalize to YYYY-MM-DD format.
- "key_facts" should be an array of strings — the 3–5 most important pieces of information.

EMAIL:
[paste email]
```

---

### Resume / CV Parser

```
You are a resume parsing system. Extract structured data from the resume below.

Return a JSON object with this exact schema:
{
  "full_name": "",
  "email": "",
  "phone": "",
  "location": "",
  "linkedin": "",
  "github": "",
  "summary": "",
  "current_title": "",
  "years_experience": number,
  "skills": {
    "languages": [],
    "frameworks": [],
    "tools": [],
    "soft_skills": []
  },
  "experience": [
    {
      "company": "",
      "title": "",
      "start_date": "YYYY-MM",
      "end_date": "YYYY-MM or present",
      "duration_months": number,
      "responsibilities": [],
      "achievements": []
    }
  ],
  "education": [
    {
      "institution": "",
      "degree": "",
      "field": "",
      "graduation_year": number
    }
  ],
  "certifications": [],
  "languages_spoken": []
}

Return ONLY the JSON object. Normalize all dates to YYYY-MM format. If a field is not present, use null for strings, 0 for numbers, and [] for arrays.

RESUME:
[paste resume text]
```

---

### Product Catalog Normalization

```
I have a list of product descriptions in various formats from different suppliers. Standardize them into a consistent catalog format.

TARGET FORMAT (JSON array):
[
  {
    "sku": "",
    "name": "",
    "brand": "",
    "category": "",
    "price_usd": number,
    "currency_original": "",
    "price_original": number,
    "description": "",
    "features": [],
    "dimensions": {
      "length_cm": null,
      "width_cm": null,
      "height_cm": null,
      "weight_kg": null
    },
    "in_stock": true/false,
    "image_url": ""
  }
]

RULES:
- Convert all prices to USD (use approximate conversion if needed, flag with [APPROXIMATE])
- Convert all dimensions to centimeters
- Normalize category names to: Electronics / Clothing / Home / Sports / Beauty / Food / Other
- If SKU not provided, generate a placeholder: "TEMP-[sequential number]"
- Return ONLY the JSON array.

PRODUCTS:
[paste raw product data]
```

---

### Contract / Document Key Term Extraction

```
You are a legal document analyst. Extract key terms and obligations from the following contract.

Return a JSON object:
{
  "document_type": "",
  "parties": [
    {"name": "", "role": ""}
  ],
  "effective_date": "YYYY-MM-DD or null",
  "expiration_date": "YYYY-MM-DD or null",
  "auto_renewal": true/false,
  "notice_period_days": null or number,
  "payment_terms": "",
  "payment_amount": null or number,
  "payment_currency": "",
  "payment_frequency": "",
  "key_obligations": {
    "party_a": [],
    "party_b": []
  },
  "termination_conditions": [],
  "liability_cap": null or number,
  "governing_law": "",
  "dispute_resolution": "",
  "key_dates": [
    {"date": "YYYY-MM-DD", "description": ""}
  ],
  "unusual_clauses": [],
  "risk_flags": []
}

IMPORTANT: 
- "risk_flags" should highlight any unusual, one-sided, or potentially problematic clauses
- This is for informational extraction only — do not provide legal advice
- If a field is not present or unclear, use null
- Return ONLY the JSON object

CONTRACT:
[paste contract]
```

---

### Survey / Form Response Analysis

```
You are a data analyst. I have [X] survey responses on the topic of [topic]. Analyze them and return a structured summary.

Return a JSON object:
{
  "total_responses": number,
  "themes": [
    {
      "theme": "",
      "frequency": number,
      "percentage": number,
      "representative_quotes": [],
      "sentiment": "[positive/neutral/negative/mixed]"
    }
  ],
  "key_insights": [],
  "action_items": [],
  "unexpected_findings": [],
  "net_sentiment": "[positive/neutral/negative/mixed]",
  "verbatim_highlights": []
}

RULES:
- Identify the top 5–8 themes by frequency
- Include 2–3 representative quotes per theme
- "action_items" should be concrete, specific recommendations
- "unexpected_findings" are things that surprised you relative to typical survey results
- Return ONLY the JSON object

RESPONSES:
[paste responses]
```

---

### Optimization Tips

**1. Schema-first approach.** Always define the exact JSON schema before providing the data. This prevents the model from making structural decisions you haven't approved.

**2. Normalize edge cases explicitly.** Tell the model: "If a date is in format DD/MM/YYYY, convert to YYYY-MM-DD." Don't assume the model will handle variations consistently.

**3. Batch in chunks.** For large datasets, process in batches of 10–20 records and concatenate results. Quality degrades with very large inputs.

**4. Validation pass.** After extraction, run a second prompt:
```
Review this JSON output for inconsistencies, missing required fields, and data format errors. Return a list of issues found, then the corrected JSON.
[paste JSON]
```

**5. Build validation schemas.** Define a JSON Schema (or Zod schema for TypeScript) and validate extracted data programmatically. Use the AI for extraction, code for validation.
---

---

# PART 4 — PROMPT TEMPLATE LIBRARY

> **How to use this library:**
> Each template is ready to use. Replace anything in `[brackets]` with your specific information. The "Notes" section tells you when and how to customize.

---

## Section A: Content & Copywriting Templates

---

**Template 01**
**Template Name:** Cold Email (B2B Outreach)
**Use Case:** Sales prospecting, partnership outreach, freelance client acquisition

```
You are an expert B2B copywriter who specializes in cold email outreach. You write emails that get replies because they are relevant, brief, and genuinely valuable.

Write a cold email for the following situation:

SENDER: [Your name], [Your role] at [Your company]
RECIPIENT: [Recipient name], [Their role] at [Their company]
GOAL: [Book a call / Propose a partnership / Offer a service]
PAIN POINT TO ADDRESS: [Specific problem they likely have]
VALUE PROPOSITION: [What you offer and the specific benefit]
SOCIAL PROOF: [One relevant result or client, if available]

CONSTRAINTS:
- Total length: under 120 words
- Subject line: under 50 characters, no clickbait
- Do not use the phrase "I hope this email finds you well"
- No more than one question per email
- End with a low-friction CTA (not "Can we schedule a 30-minute call?")
- Write in first person, conversational but professional

Return: Subject line + Email body
```

**Notes:** Use for LinkedIn InMail by removing the subject line. For follow-ups, add to the system context: "This is a follow-up to the email below — acknowledge the previous message briefly." Works best when the pain point is specific and verifiable (e.g., "I noticed your website isn't mobile optimized" vs. "I can help your business").

---

**Template 02**
**Template Name:** LinkedIn Post (Thought Leadership)
**Use Case:** Personal brand building, lead generation, professional visibility

```
You are a LinkedIn content strategist who creates posts that get 10x the average engagement for professional audiences.

Write a LinkedIn post based on the following:

AUTHOR BACKGROUND: [Your industry, role, years of experience]
TOPIC/LESSON: [The insight, story, or lesson you want to share]
AUDIENCE: [Who you're writing for — their role, challenges, interests]
GOAL: [Build credibility / Drive profile visits / Generate leads / Start discussion]

POST STYLE: [Choose: Story-driven / Contrarian take / How-to / Observation / Data-driven]

CONSTRAINTS:
- Opening line must stop the scroll — no starting with "I" or generic statements
- Maximum 1,300 characters (LinkedIn's "see more" threshold)
- Use line breaks strategically — no paragraphs longer than 2 lines
- End with a question or bold statement that invites comments
- Do not use hashtags in the body — add 3 relevant hashtags at the very end only
- Avoid: "Excited to share," "Humbled," "Grateful," "Game-changer"
```

**Notes:** The opening line is 80% of your engagement. Generate 5 opening line variations before writing the full post. For carousel posts, use this prompt per slide: "Write the text for slide [X] of [total] in a LinkedIn carousel about [topic]. Each slide should be one insight. Max 30 words per slide."

---

**Template 03**
**Template Name:** Blog Post Introduction (Hook + Promise)
**Use Case:** Content marketing, SEO blogging, newsletters

```
Write a blog post introduction for the following article:

ARTICLE TITLE: [Title]
PRIMARY KEYWORD: [Keyword]
TARGET READER: [Who they are and what they're struggling with]
ARTICLE PROMISE: [What the reader will know or be able to do after reading]

INTRODUCTION STRUCTURE:
1. Hook (1–2 sentences): Start with a surprising fact, bold claim, or vivid problem scenario — not a question
2. Problem amplification (2–3 sentences): Make the reader feel understood — describe their specific frustration
3. Promise + credibility (2–3 sentences): Tell them exactly what this article delivers and why they should trust it
4. Transition sentence: Bridge naturally into the first section

CONSTRAINTS:
- Total length: 100–140 words
- Do not start with "Are you..." or "In today's world..."
- Do not use passive voice in the first sentence
- The hook must be specific, not generic
```

**Notes:** Use this as a separate step before generating the full article. A strong introduction reduces bounce rate. For news-style content, swap "Hook" for a "lede" that summarizes the most newsworthy fact.

---

**Template 04**
**Template Name:** Email Newsletter (Weekly Edition)
**Use Case:** Newsletter content creation, audience nurturing, thought leadership

```
You are a newsletter editor writing for [Newsletter Name], a [weekly/bi-weekly] newsletter for [audience description].

Write this week's newsletter edition.

THEME/TOPIC: [Main topic for this issue]
CONTENT SOURCES: [Any articles, ideas, or links to include]
RECURRING SECTIONS:
- Opening note (personal, conversational, 80–100 words)
- Main feature (300–400 words — the core value piece)
- Quick hits (3 brief items: one insight, one tool, one quote)
- CTA / Closing (50–75 words)

BRAND VOICE: [3 adjectives describing your tone]
SUBSCRIBER RELATIONSHIP: [e.g., "like a smart friend who sends their best finds" / "a trusted industry expert"]

Do not include subject line suggestions in the body — those are separate.
```

**Notes:** Build a consistent "context block" with your newsletter's name, audience, and past examples to ensure voice consistency across issues. For the "Quick hits" section, provide the raw links/facts and let the model write the commentary.

---

**Template 05**
**Template Name:** YouTube Video Script (Educational)
**Use Case:** YouTube content, online courses, explainer videos

```
You are a YouTube script writer who creates educational videos that are clear, engaging, and retain viewers through to the end.

Write a complete video script for:

TITLE: [Video title]
TARGET AUDIENCE: [Who is watching, what they know, what they want to learn]
VIDEO LENGTH: [5 min / 10 min / 15 min]
KEY POINTS TO COVER: [Bullet list of 3–5 main points]
DESIRED OUTCOME: [What the viewer can do or understand after watching]

SCRIPT STRUCTURE:
- HOOK (0:00–0:30): Open with the biggest value claim or most surprising fact
- INTRO/CREDIBILITY (0:30–1:00): Brief, fast — who you are and why they should listen
- MAIN CONTENT: [Segmented sections based on key points]
- RECAP (last 1 min): Summarize 3 key takeaways
- CTA (last 30 sec): One clear action — subscribe, download, link in description

FORMAT:
- Write as spoken dialogue, not formal prose
- Mark B-roll suggestions in [BRACKETS]
- Mark visual aids as [GRAPHIC: description]
- Include estimated time stamps for each section
```

**Notes:** After generating the script, use this follow-up: "Review this script for pacing. Identify any sections that are too dense or could lose viewer attention, and suggest how to break them up or add engagement hooks."

---

**Template 06**
**Template Name:** Case Study
**Use Case:** Sales collateral, website social proof, content marketing

```
You are a content marketer writing a B2B case study.

Write a case study based on the following information:

CLIENT: [Client name / company type if anonymized]
INDUSTRY: [Industry]
COMPANY SIZE: [Employees/revenue range]
THE CHALLENGE: [Specific problem they had before working with you]
THE SOLUTION: [What you did — be specific]
THE RESULTS: [Specific, measurable outcomes with numbers]
TIMELINE: [How long the project took]
QUOTE (if available): [Client testimonial]

CASE STUDY STRUCTURE:
1. Title: "[Specific Result]: How [Client Type] [Achieved Outcome] in [Timeframe]"
2. At a Glance: 3-line summary table (Challenge / Solution / Results)
3. Background (100 words): Who the client is and their context
4. The Challenge (150 words): The specific problem, why it mattered, what they'd tried before
5. The Solution (200 words): What you delivered, step by step
6. The Results (150 words): Quantified outcomes + qualitative impact
7. Client Quote (if available)
8. CTA (50 words): What to do next

TONE: Credible, specific, business-focused. Not marketing fluff.
```

**Notes:** The most important sections are Challenge and Results. If you don't have exact numbers, use: "reduced [problem] significantly" or ask the client to approve approximate ranges. Case studies with specific numbers ("47% reduction in support tickets") perform 3x better than vague ones.

---

**Template 07**
**Template Name:** Product Hunt Launch Copy
**Use Case:** Product Hunt launches, app store descriptions, marketplace listings

```
You are a product launch copywriter specializing in Product Hunt and developer-focused communities.

Write launch copy for the following product:

PRODUCT NAME: [Name]
TAGLINE (current draft, if any): [Current tagline or "none"]
WHAT IT DOES: [One sentence — what problem it solves and for whom]
KEY FEATURES: [3–5 bullet points]
TARGET USER: [Who this is for]
MAIN DIFFERENTIATOR: [What makes this different from alternatives]

DELIVERABLES:
1. Tagline (under 60 characters — clear, benefit-first, not clever-for-clever's-sake)
2. Product Hunt description (260 characters max)
3. First comment / maker intro (200–250 words — personal, story-driven, explains the "why")
4. Twitter announcement thread (5 tweets: hook + 3 feature tweets + CTA)

TONE: Genuine, direct, founder-voice. Not corporate marketing speak.
```

**Notes:** The maker intro comment is often more important than the product description on Product Hunt. Make it personal — tell the origin story. Use the tagline A/B testing approach: generate 8 options, then test them as Twitter polls before launch day.

---

**Template 08**
**Template Name:** Sales Proposal Executive Summary
**Use Case:** Freelance proposals, agency pitches, consulting engagements

```
You are a senior consultant and proposal writer. Write a compelling executive summary for a sales proposal.

CONTEXT:
- Our company: [Name + one-line description]
- Prospect: [Company name + relevant background]
- Proposed project: [What you're proposing to do]
- Project duration: [Timeline]
- Investment: [$X or "see full proposal"]
- Their stated problem: [What they told you they need]
- Their real problem (if different): [Root cause or unstated need]
- Expected outcomes: [3 specific, measurable results]

EXECUTIVE SUMMARY STRUCTURE:
1. The Situation (2 sentences): Mirror their reality back to them
2. The Opportunity (2 sentences): What becomes possible when this is solved
3. Our Approach (3–4 sentences): High-level what you'll do and why it works
4. Expected Outcomes (3 bullet points with specifics)
5. Why Us (2 sentences): The specific reason you are the right choice
6. Recommended Next Step (1 sentence)

TONE: Confident, consultative, client-focused (not self-congratulatory). Write to the decision-maker, not the day-to-day contact.
LENGTH: 250–300 words
```

**Notes:** The "Their real problem" field is the most important input. If you've done discovery calls well, you'll know the difference between what they asked for and what they actually need. Put that insight in paragraph 2 — it demonstrates you listened.

---

## Section B: Developer & Technical Templates

---

**Template 09**
**Template Name:** Code Refactor Review
**Use Case:** Technical debt reduction, code review, onboarding new developers

```
You are a senior software engineer performing a code review. Your goal is to make this code production-ready, maintainable, and performant.

Review the following code and provide:
1. Refactored version (complete, not just snippets)
2. List of changes made with brief explanation for each
3. Any remaining concerns or trade-offs

REFACTORING PRIORITIES (in order):
1. Correctness: Fix any bugs or logic errors first
2. Security: Address any vulnerabilities
3. Readability: Naming, structure, comments
4. Performance: Algorithmic improvements, unnecessary operations
5. Maintainability: Reduce complexity, improve testability

LANGUAGE/FRAMEWORK: [Specify]
CONTEXT: [What this code does and where it runs]
CONSTRAINTS: [Any compatibility requirements, e.g., "must support Node 18+"]

CODE:
[paste code]
```

**Notes:** Use this after writing a first draft of any significant function. For large files, run this section by section. If you have style guide requirements (e.g., Airbnb ESLint rules), specify them in constraints.

---

**Template 10**
**Template Name:** Database Schema Designer
**Use Case:** New project setup, data modeling, schema documentation

```
You are a database architect with expertise in relational database design.

Design a complete database schema for the following application:

APPLICATION: [Brief description]
MAIN ENTITIES: [List the main things the app needs to track]
KEY RELATIONSHIPS: [Describe how entities relate to each other]
SCALE EXPECTATION: [e.g., "startup, under 10K users initially" or "expected 1M+ records"]
DATABASE: [PostgreSQL / MySQL / SQLite]

DELIVERABLES:
1. Entity-Relationship description (text)
2. Complete SQL CREATE TABLE statements with:
   - Appropriate data types (not everything is VARCHAR(255))
   - Primary keys (UUID preferred for distributed systems, INT for simple apps)
   - Foreign keys with ON DELETE behavior specified
   - Indexes on all foreign keys and frequently queried columns
   - created_at / updated_at timestamps on all tables
   - Appropriate constraints (NOT NULL, UNIQUE, CHECK)
3. List of indexes with justification for each
4. Any denormalization decisions and why

CONSTRAINTS:
- Third normal form minimum
- No EAV tables unless absolutely necessary
- Explain any design decisions that might not be obvious
```

**Notes:** After schema generation, follow up with: "What are the 5 most likely performance bottlenecks in this schema as the data scales, and how would you address each?" This surfaces issues before they become production problems.

---

**Template 11**
**Template Name:** API Endpoint Documentation
**Use Case:** Developer documentation, API references, onboarding

```
Generate API documentation for the following endpoint.

Return documentation in this exact format:

## [HTTP Method] /[endpoint path]

**Description:** [What this endpoint does]

**Authentication:** [None / API Key / Bearer Token / OAuth]

**Rate Limit:** [Requests per minute]

### Request

**Headers:**
| Header | Required | Description |
|--------|----------|-------------|
| [name] | Yes/No   | [description] |

**Path Parameters:**
| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|

**Query Parameters:**
| Parameter | Type | Required | Default | Description |
|-----------|------|----------|---------|-------------|

**Request Body:** (if applicable)
```json
{
  // schema with comments
}
```

### Response

**Success Response (200):**
```json
{
  // example response
}
```

**Error Responses:**
| Status Code | Error Code | Description |
|------------|------------|-------------|

### Example Request (curl)
```bash
curl -X [METHOD] ...
```

ENDPOINT TO DOCUMENT:
[paste endpoint code or description]
```

**Notes:** Generate documentation for every endpoint in sequence. For large APIs, use a batch prompt: provide all endpoints and ask for the documentation index first, then expand each one.

---

**Template 12**
**Template Name:** Technical Architecture Decision Record (ADR)
**Use Case:** Engineering decision documentation, team alignment, onboarding

```
Write an Architecture Decision Record (ADR) for the following technical decision:

DECISION: [What was decided]
DATE: [YYYY-MM-DD]
STATUS: [Proposed / Accepted / Deprecated / Superseded]
DECISION MAKERS: [Team/names]

CONTEXT:
[Describe the problem or requirement that led to this decision. What forces are at play?]

ALTERNATIVES CONSIDERED:
[List 2–4 alternatives that were evaluated]

DECISION DETAILS:
[Detailed description of what was decided and how it works]

CONSEQUENCES (positive):
[List the expected positive outcomes]

CONSEQUENCES (negative):
[List the trade-offs and known downsides]

FOLLOW-UP ACTIONS:
[What needs to happen as a result of this decision]

FORMAT: Standard ADR markdown format. Be concise but complete. This document will be read by future engineers trying to understand why this decision was made.
```

**Notes:** Use this after any significant architectural decision — library choice, infrastructure approach, data model decision, API design. The goal is to capture "why" not just "what."

---

**Template 13**
**Template Name:** Bug Report Generator
**Use Case:** Issue tracking, QA documentation, developer communication

```
You are a QA engineer. Convert the following raw bug description into a properly structured bug report.

RAW DESCRIPTION:
[Paste the raw, informal description of the bug]

Generate a structured bug report:

**Title:** [Concise, descriptive — under 80 characters, format: "[Component] — [What fails] when [Condition]"]

**Severity:** [Critical / High / Medium / Low]
**Priority:** [P1 / P2 / P3 / P4]
**Component:** [Which part of the system]
**Reported by:** [Name]
**Date:** [Today]
**Environment:** [Browser/OS/App version/Server env]

**Description:**
[Clear one-paragraph description of the bug]

**Steps to Reproduce:**
1. [Step]
2. [Step]
...

**Expected Behavior:**
[What should happen]

**Actual Behavior:**
[What actually happens]

**Impact:**
[Who is affected and how severely]

**Workaround (if known):**
[Any temporary fix or way to avoid the bug]

**Attachments:**
[List what screenshots/logs are included]
```

**Notes:** Use this to standardize bug reports from non-technical stakeholders. Add to your team's workflow: "When anyone reports a bug verbally or in Slack, paste it into this template before creating a ticket."

---

**Template 14**
**Template Name:** README Generator
**Use Case:** Open source projects, internal tools, portfolio projects

```
You are a technical writer. Generate a comprehensive README.md for the following project.

PROJECT INFO:
- Name: [Project name]
- Type: [Library / CLI tool / Web app / API / Framework]
- Language/Stack: [Technologies]
- Purpose: [What it does in one sentence]
- Target users: [Developers / End users / Both]

INCLUDE THESE SECTIONS:
1. Project title + badges (build status, version, license)
2. One-line tagline
3. Description (3–5 sentences, no fluff)
4. Features list (5–8 bullet points)
5. Prerequisites
6. Installation (step by step)
7. Quick start / Usage (with code examples)
8. Configuration (if applicable — table format)
9. API Reference (link or brief overview)
10. Examples (2–3 practical use cases with code)
11. Contributing guidelines
12. License
13. Support/Contact

TONE: Friendly but technical. Assume readers are developers who hate wading through marketing copy.

ACTUAL CODE OR DESCRIPTION TO WORK FROM:
[paste code, description, or both]
```

**Notes:** The "Quick Start" section is the most important. Users decide whether to use your project in the first 60 seconds of reading. If they can't get a working example in 5 minutes, they leave.

---

## Section C: Business & Operations Templates

---

**Template 15**
**Template Name:** Job Description Writer
**Use Case:** Hiring, HR documentation, Applicant Tracking System postings

```
You are an HR specialist and talent acquisition expert. Write a job description that attracts the right candidates and clearly sets expectations.

ROLE DETAILS:
- Job title: [Title]
- Department: [Department]
- Reports to: [Role]
- Location: [City / Remote / Hybrid]
- Compensation range: [Range or "competitive"]
- Employment type: [Full-time / Part-time / Contract]
- Experience level: [Junior / Mid / Senior / Lead]

COMPANY CONTEXT:
- Company: [Name + one-line description]
- Stage: [Startup / Growth / Enterprise]
- Culture descriptors: [3–5 adjectives]
- Team size: [Approximate]

ROLE REQUIREMENTS:
- What they'll actually do: [Key responsibilities]
- Required skills: [Non-negotiable must-haves]
- Nice-to-have skills: [Preferred but not required]
- Soft skills that matter: [Specific to this role]

FORMAT:
1. Role Overview (3–4 sentences — sell the role)
2. What you'll do (5–7 bullet points — action-oriented)
3. What we're looking for (Required: 4–6 bullets / Nice to have: 2–3 bullets)
4. What you'll get (Compensation, benefits, growth — honest and specific)
5. About us (3–4 sentences — compelling, not boilerplate)

TONE: Human, honest, specific. No "rockstar," "ninja," or "passionate" clichés. Write the job description you'd want to read.
```

**Notes:** Add this at the end: "Review this job description for language that might inadvertently discourage qualified candidates from applying (gendered language, unnecessarily high experience requirements, vague 'culture fit' mentions)." This improves candidate diversity.

---

**Template 16**
**Template Name:** Meeting Agenda + Pre-Read
**Use Case:** Executive meetings, project kickoffs, team standups, client calls

```
Create a meeting agenda and pre-read document for the following:

MEETING TYPE: [Kickoff / Status update / Decision-making / Brainstorm / Retrospective / Client review]
MEETING TITLE: [Title]
DATE/TIME: [When]
DURATION: [How long]
ATTENDEES: [Names/roles]
FACILITATOR: [Name]

PURPOSE:
[What decisions need to be made or what outcome is needed]

CONTEXT:
[Background information attendees need to understand]

AGENDA ITEMS:
[List the topics to cover]

Generate:
1. MEETING AGENDA (time-boxed)
   - Each item: Topic | Owner | Time allocation | Goal (decision/discussion/update)
   
2. PRE-READ DOCUMENT (for attendees to review before the meeting)
   - Context summary (under 200 words)
   - Key questions to think about
   - Any decisions that need to be pre-socialized
   - Materials/links to review

3. SUCCESS CRITERIA
   - How will you know this meeting was successful?
```

**Notes:** For recurring meetings, templatize the agenda and adjust the "context" and "agenda items" each time. Research shows meeting effectiveness increases by 40% when attendees receive and review a pre-read.

---

**Template 17**
**Template Name:** Performance Review Writer
**Use Case:** Manager writing reviews, self-assessments, 360 feedback

```
You are an HR professional helping a manager write a fair, specific, and constructive performance review.

EMPLOYEE INFO:
- Name: [Name]
- Role: [Title]
- Review period: [Q[X] YYYY / Annual]
- Manager: [Name]
- Department: [Department]

ACCOMPLISHMENTS (provide raw notes):
[List of things they did well, wins, projects]

AREAS FOR IMPROVEMENT (provide raw notes):
[Honest assessment of where they struggled or need growth]

RATING: [Exceeds / Meets / Below Expectations — or your company's scale]

GOALS FOR NEXT PERIOD:
[2–3 things you want them to focus on]

Write a performance review that:
1. Opens with an overall summary (3 sentences)
2. Highlights specific accomplishments with concrete examples
3. Addresses improvement areas constructively — focus on behaviors, not personality
4. Sets 2–3 specific, measurable goals for the next period
5. Closes with a forward-looking motivating statement

TONE: Professional, honest, fair. Evidence-based. No empty praise. No personal criticism — only behavioral observations.
LENGTH: 400–600 words
```

**Notes:** Never use AI-generated performance reviews without personal review and editing. They are a starting point. Ensure specific examples are accurate — inaccurate examples in reviews create legal and trust issues.

---

**Template 18**
**Template Name:** Investor Update Email
**Use Case:** Startup founders, investor relations, board communication

```
You are a startup communications expert. Write a monthly investor update email.

COMPANY: [Name + stage]
PERIOD: [Month/Quarter]
AUTHOR: [Founder name]

METRICS TO INCLUDE:
- MRR/ARR: [Current + change]
- Growth rate: [MoM or YoY]
- Customer count: [Current + change]
- Churn: [Rate]
- Runway: [Months]
- Burn rate: [Monthly]
- Key pipeline metric: [e.g., demos booked, trials started]

HIGHLIGHTS (major wins this period):
[List 2–3 specific wins]

LOWLIGHTS (honest challenges):
[List 1–2 real challenges — investors respect transparency]

ASKS (what you need from the network):
[Specific requests: intros, advice, candidates]

NEXT PERIOD PRIORITIES:
[3 main focuses for next month]

FORMAT:
- Subject line: "[Company] Update — [Month YYYY]: [One key metric or headline]"
- Length: 400–500 words
- Use bold headers for sections
- Be direct — investors read 20+ updates per month, they value brevity and honesty

TONE: Confident, transparent, founder-voice. Not sales-y, not panicked, not over-polished.
```

**Notes:** The "Lowlights" section is what distinguishes founders investors trust. Boards and angels who receive overly positive updates disengage over time. Lead with metrics, be honest about challenges, and always include specific asks.

---

**Template 19**
**Template Name:** Terms of Service / Privacy Policy Sections
**Use Case:** SaaS products, apps, websites, marketplaces

```
You are a technology attorney drafting terms for a software product. Write a [Terms of Service section / Privacy Policy section] for the following scenario.

SECTION NEEDED: [e.g., "Limitation of Liability" / "Data Retention" / "User Content License" / "Account Termination"]

PRODUCT TYPE: [SaaS / Mobile app / Marketplace / E-commerce / API]
JURISDICTION: [US / EU / UK / [Country]] — note any specific regulations that apply
DATA COLLECTED: [List types of data collected, if Privacy Policy section]
USER TYPE: [Consumers / Businesses / Both]
KEY CONCERNS: [Any specific scenarios you want to address]

Write the section in:
- Plain English where possible, legal precision where required
- Complete, self-standing language (can be inserted into a larger document)
- Standard legal formatting with section numbers

IMPORTANT NOTE TO INCLUDE AT END: "This is a starting draft for legal review only. Have a qualified attorney review before publishing."
```

**Notes:** AI-generated legal text is a starting draft, not a final product. Use it to reduce attorney billable hours by providing a pre-drafted section for review. Always have a lawyer sign off on any legal document.

---

**Template 20**
**Template Name:** Standard Operating Procedure (SOP)
**Use Case:** Team documentation, onboarding, process standardization

```
You are a business operations specialist. Write a Standard Operating Procedure for the following process.

PROCESS NAME: [Name]
DEPARTMENT: [Which team performs this]
FREQUENCY: [How often this is done]
PROCESS OWNER: [Role responsible]

OVERVIEW:
[Describe the process in 2–3 sentences — what it is and why it matters]

INPUTS (what's needed to start this process):
[List required resources, tools, access, information]

STEPS (raw notes):
[Describe the steps, even informally — I'll structure them]

EXCEPTIONS/EDGE CASES:
[Known situations where the standard process doesn't apply]

OUTPUTS:
[What is produced by this process]

FORMAT:
1. Purpose (1 sentence)
2. Scope (who this applies to)
3. Prerequisites (tools/access needed)
4. Step-by-step instructions (numbered, each step actionable and specific)
5. Exception handling (if X, then Y)
6. Quality checks (how to verify it was done correctly)
7. Related documents/links

STYLE: Numbered steps only. Every step should begin with a verb. Assume the reader is doing this for the first time.
```

**Notes:** After generating the SOP, test it by asking someone unfamiliar with the process to follow it. Any point of confusion means a step needs more detail. Use this for any process done more than once per month.

---

## Section D: AI-Powered Tool Building Templates

---

**Template 21**
**Template Name:** AI Product Description Generator (For Automation)
**Use Case:** E-commerce automation, bulk content generation, Shopify/WooCommerce workflows

```
SYSTEM PROMPT (inject once):
You are a product copywriter for [Store Name], an e-commerce store specializing in [category]. Our brand voice is [3 adjectives]. Our customers are [target audience description]. We never use the words: [list of banned words/phrases].

USER PROMPT TEMPLATE (run per product):
Generate a product description for the following item. Return ONLY a JSON object with no extra text.

{
  "short_description": "[Under 100 words, for product cards]",
  "long_description": "[150-200 words, for product pages]",
  "bullet_points": ["[Benefit-first bullet 1]", "[Bullet 2]", "[Bullet 3]", "[Bullet 4]", "[Bullet 5]"],
  "seo_title": "[Under 60 characters, includes primary keyword]",
  "meta_description": "[Under 155 characters, includes keyword and benefit]"
}

PRODUCT DATA:
Name: [Product name]
Category: [Category]
Price: $[Price]
Key specs: [Specs]
Primary keyword: [Keyword]
```

**Notes:** This template is designed for batch automation. Build a CSV with one product per row, loop through with your API integration, and generate all descriptions in bulk. Include error handling for malformed JSON outputs.

---

**Template 22**
**Template Name:** Content Repurposing Engine
**Use Case:** Maximizing content ROI, multi-platform distribution

```
I have a piece of content that I want to repurpose across multiple channels. Transform it into all of the following formats.

ORIGINAL CONTENT:
[Paste original content — blog post, podcast transcript, video transcript, report, etc.]

ORIGINAL FORMAT: [Blog post / Video transcript / Podcast / Report]
BRAND: [Company/Personal brand name]
AUDIENCE: [Who you're talking to]

Generate all of the following:
1. **Twitter thread** (8–10 tweets, numbered, ending with a CTA tweet)
2. **LinkedIn post** (under 1,300 characters, professional tone, single key takeaway)
3. **Email newsletter section** (200–250 words, conversational, with a subject line suggestion)
4. **Instagram caption** (under 220 characters + 5 relevant hashtags)
5. **Key quotes** (5 standalone quotes suitable for visual graphics — under 140 characters each)
6. **Short-form video script** (60-second version — hook + 3 points + CTA)
7. **Podcast show notes** (title, 3-sentence description, 5 key takeaways, relevant links placeholder)

FORMAT: Return each section with a clear header. Do not include any meta-commentary between sections.
```

**Notes:** This is one of the highest-ROI prompts in this book. One piece of core content can generate 2–3 weeks of multi-platform distribution. The 60-second video script is especially useful for Reels, TikTok, and YouTube Shorts.

---

**Template 23**
**Template Name:** Competitor Analysis Report
**Use Case:** Market research, strategic planning, pitch decks, investor materials

```
You are a market research analyst and business strategist.

Conduct a structured competitive analysis for:

MY PRODUCT: [Name + description]
MY TARGET MARKET: [Segment]
COMPETITORS TO ANALYZE: [List 3–5 competitors]

For each competitor, provide:
- **Overview:** What they do and their positioning (2–3 sentences)
- **Target customer:** Who they sell to primarily
- **Pricing model:** How they charge (not specific pricing — general model)
- **Reported strengths:** What they do well
- **Reported weaknesses:** Where they fall short
- **Key differentiators:** What makes them unique

Then provide:
**Competitive Gap Analysis:**
- Features/capabilities competitors lack that I could own
- Underserved customer segments
- Positioning angles not currently occupied

**Strategic Recommendation:**
- How should I position against this competitive landscape?
- Which competitor is my main threat? Why?
- Which competitor am I most likely to pull customers from?

FORMAT: Use the structure above. Be analytical and honest — even about competitors' strengths.
NOTE: Base this on general market knowledge. Flag anything where you are uncertain.
```

**Notes:** Follow up with: "Generate 5 positioning statement options for [my product] based on this competitive landscape, each targeting a different gap." This gives you raw material for your homepage, pitch deck, and sales messaging.

---

**Template 24**
**Template Name:** Sales Call Prep Brief
**Use Case:** Account executives, sales development reps, founders doing sales

```
You are a sales strategist. Generate a pre-call research brief for the following prospect.

PROSPECT DETAILS:
- Company: [Name]
- Industry: [Industry]
- Company size: [Employees/revenue if known]
- Contact name: [Name]
- Contact title: [Title]
- Source of lead: [Inbound / Outbound / Referral]
- Previous interactions: [None / Email thread / Past call — summarize]
- What we know about their pain: [Any stated or inferred challenges]

MY PRODUCT/SERVICE: [Brief description]

CALL TYPE: [Discovery / Demo / Proposal / Close]

GENERATE:
1. **Company context** (3–4 sentences — what they do, their market position, any notable news)
2. **Contact background** (2–3 sentences — inferred from title and company context)
3. **Likely pain points** (3–5 bullets — what someone in their role at their company type typically struggles with)
4. **Discovery questions** (8–10 questions specific to this call type and prospect — not generic)
5. **Objection preparation** (3 likely objections + concise response strategy for each)
6. **Success criteria** (How will you know if this call went well?)
7. **Next step recommendation** (What should the ideal outcome of this call be?)
```

**Notes:** Generate this brief 30 minutes before the call. Update the "Previous interactions" section with notes from past calls. For high-value accounts, use web search to pull recent company news before running this prompt.

---

**Template 25**
**Template Name:** Weekly Review + Planning System
**Use Case:** Personal productivity, team retrospectives, performance management

```
You are a productivity coach and systems thinker. Guide me through a structured weekly review and planning session.

INPUT — LAST WEEK:
Wins: [What went well — even small things]
Incomplete: [What didn't get done and why]
Surprises: [Anything unexpected that came up]
Energy: [What drained you / what energized you]
Key learnings: [What you learned or observed]

INPUT — NEXT WEEK:
Goals: [What you want to accomplish]
Known events: [Meetings, deadlines, appointments]
Blockers: [Things that might prevent progress]
One priority above all else: [The single most important thing]

GENERATE:
1. **Last week retrospective** (2–3 sentences — honest assessment, patterns noticed)
2. **Top 3 priorities for next week** (numbered, with brief reasoning for each)
3. **Daily focus suggestions** (one main thing per day, Mon–Fri)
4. **Potential obstacles and pre-mortem** (what could go wrong + mitigation)
5. **One commitment** (The one thing you will NOT compromise on this week)
6. **Energy management note** (based on last week's energy patterns, one recommendation)
```

**Notes:** Use this every Sunday or Friday afternoon. After 4 weeks of inputs, add all previous weeks as context and ask: "Identify patterns across my last 4 weeks — recurring blockers, energy trends, and one behavioral change that would have the highest impact."

---

## Section E: Research & Analysis Templates

---

**Template 26**
**Template Name:** Literature Review Synthesizer
**Use Case:** Research papers, due diligence, technical decision-making

```
You are an academic researcher and analyst. Synthesize the following sources on the topic of [topic].

SOURCES:
[Paste abstracts, articles, or key passages from 3–10 sources]

SYNTHESIS TASK:
Write a structured literature review that:
1. Identifies the main consensus across sources
2. Highlights key disagreements or competing perspectives
3. Notes significant gaps in the current body of knowledge
4. Evaluates the strength of evidence for key claims
5. Draws conclusions about the current state of knowledge

FORMAT:
- Introduction: Current state of knowledge on this topic (150 words)
- Key findings: Thematic synthesis, not source-by-source summary
- Debates: Where sources disagree and why
- Gaps: What remains unknown or understudied
- Conclusion: What this means for [practical application]

ACADEMIC LEVEL: [Undergraduate / Graduate / Professional]
FLAG: Clearly mark any claims where the evidence is weak or inconsistent across sources.
```

**Notes:** This template excels when you provide the sources yourself. Never ask the model to "find sources" — it will hallucinate citations. Provide the texts; let the model do the synthesis.

---

**Template 27**
**Template Name:** Decision Framework Builder
**Use Case:** High-stakes decisions, strategic choices, team alignment

```
You are a decision analyst and systems thinker. Help me build a structured decision framework.

THE DECISION: [Describe the decision to be made]
DECISION MAKER(S): [Who is deciding]
DEADLINE: [When this must be decided]
STAKES: [What's at risk if this goes wrong]

OPTIONS BEING CONSIDERED:
[List 2–5 options]

CRITERIA THAT MATTER:
[List what's important — cost, time, risk, strategic fit, etc.]

CONSTRAINTS:
[Anything that is non-negotiable or fixed]

GENERATE:
1. **Decision matrix** (table: Options vs. Criteria, scored 1–5)
2. **Risk assessment** for each option (upside / downside / probability)
3. **Reversibility analysis** (how easy is it to reverse this decision if wrong?)
4. **Recommended option** with reasoning
5. **Key uncertainties** (what information, if known, would change the recommendation?)
6. **Decision quality check** (3 questions to ask before committing)
```

**Notes:** The "reversibility analysis" is underused in most decision frameworks. Irreversible decisions deserve 10x more deliberation than reversible ones. Always include it.

---

**Template 28**
**Template Name:** Customer Interview Script
**Use Case:** User research, product discovery, market validation

```
You are a UX researcher and product strategist. Create a customer interview script for the following research objective.

RESEARCH OBJECTIVE: [What you're trying to learn]
PARTICIPANT PROFILE: [Who you're interviewing — role, company type, usage behavior]
PRODUCT/PROBLEM AREA: [What product or problem space this is about]
INTERVIEW TYPE: [Discovery / Usability / Churn / Win-back / Persona validation]
DURATION: [45 minutes / 60 minutes]

GENERATE:
1. **Screener criteria** (3–5 questions to qualify participants)
2. **Introduction script** (2 minutes — put participant at ease, explain format)
3. **Warm-up questions** (3 questions — easy, build rapport)
4. **Core questions** (10–15 questions — the real research)
   - Use open-ended, behavior-focused questions ("Tell me about a time when...")
   - Include probe/follow-up prompts for each core question
   - Sequence from broad to specific
5. **Concept/prototype questions** (if applicable)
6. **Wrap-up** (2–3 questions — anything missed, their question for you)
7. **Facilitator notes** (tips for what to listen for, common pitfalls)

CONSTRAINTS:
- No leading questions
- No questions that assume the answer
- Focus on past behavior, not hypothetical future behavior
```

**Notes:** The most common mistake in customer interviews is asking "Would you use this feature?" (hypothetical) instead of "Tell me about the last time you tried to solve [problem]" (behavioral). This template is biased toward behavioral questions by design.

---

**Template 29**
**Template Name:** SWOT Analysis Generator
**Use Case:** Strategic planning, business reviews, investor prep, board presentations

```
You are a business strategist. Conduct a comprehensive SWOT analysis.

SUBJECT: [Company name / Product / Initiative / Market entry]
CONTEXT: [Current situation, relevant background]
TIME HORIZON: [Next 12 months / 3-year strategic plan]
PERSPECTIVE: [Internal team / Board / Investor / Competitor]

INFORMATION TO ANALYZE:
[Provide any relevant data: metrics, market information, competitive context, team strengths/weaknesses]

GENERATE:
1. **SWOT Matrix** (formatted table)
   - Strengths (internal, positive): 4–6 items
   - Weaknesses (internal, negative): 4–6 items
   - Opportunities (external, positive): 4–6 items
   - Threats (external, negative): 4–6 items

2. **Strategic implications:**
   - SO Strategies (Strengths + Opportunities): How to leverage strengths to capture opportunities
   - WO Strategies (Weaknesses + Opportunities): How to improve weaknesses to capture opportunities
   - ST Strategies (Strengths + Threats): How to use strengths to mitigate threats
   - WT Strategies (Weaknesses + Threats): How to minimize weaknesses and avoid threats

3. **Top 3 strategic priorities** based on this analysis

QUALITY STANDARD: Each SWOT item should be specific and evidence-based, not generic ("good team" is not a strength — "founding team with 15+ years of combined industry experience in X" is).
```

**Notes:** Generic SWOTs are useless. The prompt specifically asks for evidence-based specificity. Push back on any generic output with: "This strength/weakness is too generic. Make it specific to this company with concrete evidence."

---

**Template 30**
**Template Name:** Grant / Proposal Abstract
**Use Case:** Grant applications, academic proposals, government RFPs, nonprofit funding

```
You are a proposal writer with expertise in grant writing and academic/nonprofit funding.

Write a compelling abstract/executive summary for the following proposal:

PROJECT TITLE: [Title]
APPLYING TO: [Granting organization]
GRANT TYPE: [Research / Program / Capital / Operating]
AMOUNT REQUESTED: [$X]
PROJECT DURATION: [Timeline]

THE PROBLEM: [What problem does this address? Why does it matter? Scale/scope?]
THE SOLUTION: [What will you do? How does it address the problem?]
THE APPROACH: [How specifically? What methods?]
EXPECTED OUTCOMES: [Measurable results with specifics]
YOUR QUALIFICATIONS: [Why are you the right team/organization?]
BUDGET RATIONALE: [Why is this amount needed? Where does it go?]

FORMAT:
- Length: [250 words / 500 words — per application requirements]
- Open with the problem statement, not your organization
- Use the language of the funder's priorities (review their website language)
- Include at least one quantified impact statement
- End with the transformative outcome — what changes because of this project?

TONE: Confident, evidence-based, mission-driven. Not pleading. Not academic jargon.
```

**Notes:** The single most impactful tip for grants: mirror the funder's language. If they use "underserved communities," use that phrase. If they focus on "systems change," use that framing. Before running this prompt, review the funder's website and add 3–5 of their key phrases to the context.

---

## Section F: Templates 31–50 (Quick Reference)

---

**Template 31 — Onboarding Email Sequence**
```
Write a 5-email onboarding sequence for new [product] users. Email 1: Welcome + first action. Email 2 (Day 3): First value moment. Email 3 (Day 7): Feature highlight. Email 4 (Day 14): Social proof + upgrade nudge. Email 5 (Day 30): Check-in + success story. Each email: under 200 words, one CTA, subject line included.

PRODUCT: [Name]
KEY FEATURE TO HIGHLIGHT IN EMAIL 3: [Feature]
UPGRADE OFFER: [What to upsell]
BRAND VOICE: [Adjectives]
```

---

**Template 32 — Press Release**
```
Write a press release for: [Announcement — product launch, funding, partnership, milestone].
FORMAT: Standard inverted pyramid. Dateline. Quote from [Name, Title]. Boilerplate at end.
LENGTH: 400–500 words. Include a suggested headline and subheadline.
AUDIENCE: [Tech press / Industry press / General media]
KEY MESSAGE: [The one thing every journalist should remember]
```

---

**Template 33 — Social Media Content Calendar**
```
Create a 2-week social media content calendar for [Brand] on [Platform(s)].
THEME FOR PERIOD: [Topic or campaign focus]
POSTING FREQUENCY: [X times per week]
CONTENT MIX: [% educational / % promotional / % engagement / % behind-the-scenes]
Format as a table: Date | Platform | Content type | Caption (full) | CTA | Hashtags
```

---

**Template 34 — FAQ Page Generator**
```
Generate a comprehensive FAQ page for [Product/Service].
Include 15–20 questions covering: pricing, features, getting started, troubleshooting, account management, security/privacy.
Format: Question (natural language, how a real customer would ask it) | Answer (direct, under 100 words, no jargon).
Organize into sections: Getting Started / Features / Pricing / Technical / Support.
```

---

**Template 35 — Objection Handling Script**
```
You are a sales trainer. For the product/service below, write a complete objection handling guide.
PRODUCT: [Description]
PRICE: [$X]
Generate responses to these objections: "Too expensive," "We already use [competitor]," "Not the right time," "Need to think about it," "Need to talk to my [partner/boss/team]," "We can build this ourselves."
For each: Acknowledge → Reframe → Evidence → CTA. Under 75 words per response.
```

---

**Template 36 — Landing Page Copy (Full)**
```
Write complete landing page copy for: [Product/Offer].
SECTIONS: Hero (headline + subheadline + CTA), Problem section (3 pain points), Solution section, Features (3, benefit-first), Social proof (3 testimonials — write placeholder versions), Pricing (if applicable), FAQ (5 questions), Final CTA.
TARGET CUSTOMER: [Description]
PRIMARY GOAL: [Sign up / Buy / Book demo]
TONE: [Adjectives]
```

---

**Template 37 — Podcast Guest Pitch**
```
Write a podcast guest pitch email for:
HOST: [Podcast name + host name]
PODCAST TOPIC: [What the podcast covers]
GUEST: [Name + one-line bio]
PROPOSED TOPIC: [What they'd talk about]
AUDIENCE VALUE: [What listeners would learn]
CREDIBILITY: [Notable mentions, results, or expertise markers]
LENGTH: Under 200 words. Lead with audience value, not guest credentials.
```

---

**Template 38 — Technical Specification Document**
```
Write a technical specification for the following feature:
FEATURE NAME: [Name]
PRODUCT: [Product + tech stack]
USER STORY: As a [user type], I want to [action] so that [benefit].
REQUIREMENTS: [Functional requirements list]
NON-FUNCTIONAL REQUIREMENTS: [Performance, security, scalability needs]
SECTIONS: Overview, User Stories, Acceptance Criteria, Data Model changes, API changes, UI/UX notes, Testing considerations, Open questions, Out of scope.
```

---

**Template 39 — Affiliate Marketing Email**
```
Write a promotional email for an affiliate product.
MY NICHE/AUDIENCE: [Description]
AFFILIATE PRODUCT: [Name + what it does]
MY EXPERIENCE WITH IT: [How I've used it / results I've gotten]
OFFER/DISCOUNT: [Any special deal]
EMAIL TYPE: [Personal recommendation / Review / Resource roundup]
LENGTH: Under 300 words. First person. No hype. Lead with my personal story/result.
```

---

**Template 40 — Customer Success Check-in Email**
```
Write a customer success check-in email sequence (3 emails) for customers who have been using [Product] for [30/60/90] days.
Email 1 (Milestone check-in): Ask about their experience, share a pro tip, offer a resource.
Email 2 (Value confirmation): Reference their likely use case, share a case study, soft upsell.
Email 3 (Relationship building): Personal note, ask for feedback, offer a referral incentive.
Each email under 150 words. Written by [CSM Name].
```

---

**Template 41 — Annual Report Summary**
```
Write a 1-page executive summary of the following annual report data:
COMPANY: [Name + description]
KEY METRICS: [Revenue, growth rate, customers, team size, key milestones]
HIGHLIGHTS: [Top 3–5 achievements]
CHALLENGES: [Honest acknowledgment of what was hard]
OUTLOOK: [2 sentences on next year's priorities]
AUDIENCE: [Shareholders / Team / Public]
LENGTH: 400 words. Lead with the headline number. End with forward momentum.
```

---

**Template 42 — Employee Handbook Section**
```
Write a [section name, e.g., "Remote Work Policy" / "Code of Conduct" / "PTO Policy"] for an employee handbook.
COMPANY TYPE: [Stage, size, industry]
CULTURE: [Adjectives — e.g., flexible, trust-based, results-oriented]
KEY RULES/POLICIES: [Specific rules to include]
TONE: Clear and human, not legalese. Employees should want to read this.
INCLUDE: The policy itself + the "why" behind it (brief) + how to handle exceptions.
```

---

**Template 43 — Negotiation Preparation Brief**
```
You are a negotiation coach. Help me prepare for the following negotiation:
WHAT I'M NEGOTIATING: [Salary / Contract / Partnership / Vendor deal]
MY POSITION: [What I want + my justification]
THEIR LIKELY POSITION: [What they want + their constraints]
MY WALK-AWAY POINT: [Minimum acceptable outcome]
MY IDEAL OUTCOME: [Best-case scenario]
GENERATE: Opening position, 3 trade-able concessions, 3 likely objections + responses, BATNA analysis, recommended opening line.
```

---

**Template 44 — Technical Blog Post**
```
Write a technical tutorial blog post for: [Topic]
AUDIENCE: [Developer experience level + what they already know]
GOAL: Reader can [specific skill/outcome] by end of article
TECH STACK: [Languages, frameworks, versions]
STRUCTURE: Introduction → Prerequisites → Step-by-step tutorial (numbered) → Code examples (working, complete) → Common errors + fixes → Conclusion + next steps
LENGTH: 1,500–2,000 words
STYLE: Clear, practical, no fluff. Every code block should be copyable and runnable.
```

---

**Template 45 — Product Roadmap Communication**
```
Write a product roadmap update for [audience: customers / investors / team].
PERIOD: [Q[X] YYYY]
COMPLETED: [Features/milestones delivered]
IN PROGRESS: [Current work]
NEXT QUARTER: [Planned work]
BEYOND: [High-level future direction]
FORMAT: Narrative-first, not just a list. Explain the "why" behind priorities. For customer-facing: focus on benefits, not technical details. For investors: connect to business metrics. LENGTH: 300–400 words + a visual roadmap description.
```

---

**Template 46 — Pitch Deck Slide Copy**
```
Write the copy for the following pitch deck slide:
SLIDE TYPE: [Problem / Solution / Market Size / Business Model / Traction / Team / Ask]
COMPANY: [Name + one-line]
KEY MESSAGE FOR THIS SLIDE: [The one thing investors should remember]
SUPPORTING DATA: [Any metrics, numbers, evidence]
FORMAT: Headline (under 10 words) + 3–5 bullet points (under 15 words each) + one key visual description.
TONE: Confident, specific, credibility-building. No adjectives that can't be measured.
```

---

**Template 47 — Customer Win-Back Campaign**
```
Write a 3-email win-back campaign for churned customers.
PRODUCT: [Name]
CHURN REASON (if known): [Why they left]
TIME SINCE CHURN: [30 / 60 / 90+ days]
WIN-BACK OFFER: [Discount, extended trial, new feature]
Email 1: Genuine "we noticed you left" — no hard sell, ask for feedback.
Email 2 (1 week later): Share what's changed/improved, introduce offer.
Email 3 (2 weeks later): Last chance — personal tone, make it easy to return.
Each under 180 words. Include subject lines.
```

---

**Template 48 — Interview Answer Coach**
```
You are an interview coach. Help me prepare an answer for the following interview question.
QUESTION: [Interview question]
MY EXPERIENCE: [Relevant background, specific examples I can draw from]
ROLE I'M INTERVIEWING FOR: [Title + company type]
FORMAT: Use the STAR method (Situation, Task, Action, Result). Keep answer to 2–3 minutes spoken. Strong opening. Quantified result. Brief forward-looking connection to the role. Practice version + coaching notes on what makes this answer strong or where it could be sharper.
```

---

**Template 49 — Course Outline Generator**
```
Create a complete online course outline for: [Topic]
TARGET STUDENT: [Who they are, what they know, what they want]
LEARNING OUTCOME: [What students will be able to do after completing the course]
FORMAT: [Video course / Written course / Cohort]
DURATION: [Approximate total hours]
STRUCTURE: Module list (5–8 modules) → Lessons per module (4–6 each) → For each lesson: title, 2-sentence description, format (video/reading/exercise), and estimated duration.
Also include: Course prerequisite skills, Course project description, Certificate criteria.
```

---

**Template 50 — Exit Interview Questions**
```
Generate a structured exit interview questionnaire for departing employees.
COMPANY TYPE: [Stage + industry]
ROLE TYPE: [Engineering / Sales / Marketing / Operations / Customer Success]
FORMAT: Mix of quantitative (1–10 rating scales) and qualitative (open-ended) questions.
TOPICS TO COVER: Reason for leaving, role satisfaction, management quality, team culture, compensation, growth opportunities, onboarding quality, what we could have done differently.
Include: Introduction script for HR, 15 questions total, analysis guide (how to synthesize responses into actionable insights).
```
---

---

# PART 5 — ADVANCED STRATEGIES

---

## Chapter 16: Multi-Step Prompting Workflows

Multi-step workflows break complex tasks into sequential prompts where each output feeds the next. This mirrors how skilled professionals work — plan, draft, review, refine, finalize.

### Why Multi-Step Beats Single-Step

A single prompt asking for a complete, polished output is asking the model to simultaneously plan, draft, optimize, and format. Quality suffers at every stage.

Multi-step prompting:
- Improves quality by focusing the model at each stage
- Creates checkpoints where you can redirect
- Produces more reliable, consistent outputs
- Makes the process auditable and repeatable

---

### Workflow 1: The Content Production Pipeline

**Use case:** Blog posts, reports, long-form content

**Step 1 — Research Brief**
```
You are a content strategist. Generate a research brief for a blog post targeting the keyword "[keyword]".

Include:
- Search intent analysis
- Target audience profile
- 5 key questions this article must answer
- Competitor content gaps (what most articles on this topic miss)
- Recommended article angle (what makes this article worth reading)

Return as a structured brief.
```

**Step 2 — Outline Approval**
```
Based on this brief:
[Paste Step 1 output]

Create a detailed article outline:
- H1 title (3 options)
- H2 sections (6–8)
- For each H2: 3 bullet points of what that section covers
- Estimated word count per section

Do not write the article yet. Just the outline.
```

**Step 3 — Section-by-Section Drafting**
```
Using this outline:
[Paste Step 2 output]

Write section [X]: "[Section title]"

Target length: [X words]
Key points to cover: [From outline]
Do not write any other section. Just this one, completely.
```

*(Repeat Step 3 for each section)*

**Step 4 — Coherence Pass**
```
I have drafted all sections of this article separately. Review the full draft below for:
1. Transition quality between sections
2. Tone consistency throughout
3. Repetition (same ideas said twice in different sections)
4. Missing connections (where a later section references something not set up earlier)

Write improved transition sentences for each section break, and flag any inconsistencies.

FULL DRAFT:
[Paste all sections]
```

**Step 5 — SEO + Final Edit**
```
Perform a final SEO and copy edit on this article:
1. Check natural inclusion of primary keyword: "[keyword]" — it should appear in H1, first paragraph, 2–3 H2s, and naturally throughout (not forced)
2. Improve any headline that doesn't include an actionable or informational signal
3. Strengthen the introduction hook if it doesn't grab attention immediately
4. Ensure the conclusion has a clear CTA

Return: Edited article + list of changes made.
```

---

### Workflow 2: The Sales Asset Production Line

**Use case:** Creating a complete sales package for a product launch

**Step 1 — Messaging Foundation**
```
We are launching [Product]. Before creating any copy, define our messaging foundation.

TARGET CUSTOMER: [Profile]
PRODUCT: [Description]
COMPETITIVE CONTEXT: [Who they compare us to]

Create:
1. Positioning statement (one sentence)
2. Primary value proposition (under 15 words)
3. 3 supporting proof points
4. Emotional core: What does the customer feel when this product solves their problem?
5. Objection map: Top 3 objections and the response to each

This messaging foundation will be used across all copy — keep it tight and consistent.
```

**Step 2 — Website Hero Copy**
```
Using this messaging foundation:
[Paste Step 1 output]

Write the website hero section:
- H1 headline (3 options)
- Subheadline (2 options)
- CTA button text (3 options)
- Hero description paragraph (under 60 words)

Pick the combination you'd recommend and explain why in one sentence.
```

**Step 3 — Email Sequence**
```
Using this messaging foundation:
[Paste Step 1 output]

Write a 3-email launch sequence:
- Email 1 (3 days pre-launch): Build anticipation, hint at problem you solve
- Email 2 (Launch day): Full announcement, primary offer, urgency
- Email 3 (3 days post-launch): Social proof + last chance (if limited offer)

Each email: Subject line + body under 250 words + CTA
```

**Step 4 — Ad Variations**
```
Using this messaging foundation:
[Paste Step 1 output]

Create 6 ad copy variations:
- 2 for Facebook/Instagram (pain-focused, outcome-focused)
- 2 for Google Search (high intent — match search keywords)
- 2 for LinkedIn (professional framing)

Each ad: Headline + Body + CTA
```

---

### Workflow 3: The Code Feature Builder

**Use case:** End-to-end feature development from spec to tested code

**Step 1 — Feature Scoping**
```
I want to build [feature description] in [framework/language].

Before writing any code, help me scope this:
1. What are the minimum requirements for an MVP of this feature?
2. What are the optional enhancements for V2?
3. What are the potential edge cases and failure modes?
4. What dependencies or existing code will this touch?
5. What's the recommended architecture for this implementation?

Do not write any code yet.
```

**Step 2 — Database / Data Model**
```
Based on this scope:
[Paste Step 1 output]

Define the data model:
1. New tables or schema changes needed
2. Migration files
3. Model/entity definitions with relationships
4. Indexes needed

Write the migration and model code only. No controllers, no routes yet.
```

**Step 3 — Core Logic**
```
Data model defined:
[Paste Step 2 output]

Now write the core business logic:
[Service class / Functions / Core module — specify what fits your architecture]

Requirements from scope:
[Paste relevant parts of Step 1]

Focus on the logic layer only. No HTTP layer, no UI yet. Include error handling and edge cases.
```

**Step 4 — API / Controller Layer**
```
Core logic complete:
[Paste Step 3 output]

Now write the [controller / API route handlers / HTTP layer].
- All endpoints defined in scope
- Request validation
- Proper HTTP status codes
- Error responses
- Authentication middleware wiring (don't rewrite auth — just wire it)
```

**Step 5 — Tests**
```
Full implementation:
[Paste Steps 2–4 combined]

Write a comprehensive test suite. Cover:
- All happy paths
- Input validation failures
- Authentication/authorization scenarios
- Edge cases identified in scoping
- At least one integration test

Framework: [PHPUnit / Jest / Pytest]
```

---

## Chapter 17: Prompt Chaining

Prompt chaining is the practice of connecting prompt outputs directly into subsequent prompts — either automatically (via code) or manually (via copy-paste). The output of Prompt A becomes the input of Prompt B.

This is distinct from multi-step workflows in one key way: **in prompt chaining, the output itself is fed as context — not just used for reference.**

---

### Chain Pattern 1: The Transformation Chain

Each step transforms the output into a different format or level of abstraction.

```
RAW DATA → Structured Summary → Narrative Report → Executive Slide
```

**Prompt 1 (Raw → Structured):**
```
Extract the key data points from this customer interview transcript. Return as a bulleted list of observations, one per line.

TRANSCRIPT:
[Paste transcript]
```

**Prompt 2 (Structured → Insights):**
```
Here are observations from customer interviews:
[Paste Prompt 1 output]

Group these into themes. For each theme: name it, list the observations that belong to it, and write a 2-sentence insight.
```

**Prompt 3 (Insights → Recommendations):**
```
Based on these customer research themes:
[Paste Prompt 2 output]

Generate 5 product recommendations in order of priority. For each: The recommendation, the insight that supports it, and the expected impact.
```

**Prompt 4 (Recommendations → Exec Slide):**
```
Convert these product recommendations into content for an executive slide:
[Paste Prompt 3 output]

Format:
- Slide title (under 8 words)
- 3 headline recommendations (bolded, under 15 words each)
- One supporting data point per recommendation
- One-line action item per recommendation
```

---

### Chain Pattern 2: The Refinement Chain

Each step critiques and improves the previous output.

```
DRAFT → Self-Critique → Improved Draft → Final Polish
```

```
PROMPT 1: Write a first draft of [X].

PROMPT 2: 
Critique this draft:
[Paste Prompt 1 output]

Rate it on: Clarity (1-10), Persuasiveness (1-10), Specificity (1-10).
Identify the 3 weakest elements.

PROMPT 3:
Rewrite the draft addressing these weaknesses:
[Paste Prompt 2 critique]

Original draft for reference:
[Paste Prompt 1 output]

PROMPT 4:
Final polish. The previous draft is now 90% there. Make micro-improvements to word choice, rhythm, and impact. Do not restructure — only refine.
[Paste Prompt 3 output]
```

---

### Chain Pattern 3: The Branching Chain

Generate multiple variations, then select and combine the best elements.

```
BRIEF → [Branch A, Branch B, Branch C] → Best Elements → Synthesis
```

```
PROMPT 1: Generate 3 completely different approaches to [task].
Approach A: [Direction A]
Approach B: [Direction B]
Approach C: [Direction C]

Label each approach clearly. Make them genuinely different — not minor variations.

PROMPT 2:
Review these three approaches:
[Paste Prompt 1]

For each approach, identify its single strongest element.

PROMPT 3:
Create a synthesized version that combines these strongest elements:
[List the 3 strongest elements identified]

This is not a compromise or average — it should be better than any single approach.
```

---

### Building Automated Prompt Chains in Code

Here's a simple Node.js pattern for automated chaining:

```javascript
const Anthropic = require('@anthropic-ai/sdk');
const client = new Anthropic();

async function runChain(inputData) {
  // Step 1: Extract
  const step1Response = await client.messages.create({
    model: 'claude-sonnet-4-20250514',
    max_tokens: 1000,
    messages: [{
      role: 'user',
      content: `Extract key information from this content and return as JSON:
      
${inputData}

Return only valid JSON with these keys: summary, key_points, sentiment, action_items`
    }]
  });
  
  const step1Output = step1Response.content[0].text;
  const structuredData = JSON.parse(step1Output);
  
  // Step 2: Transform (uses Step 1 output)
  const step2Response = await client.messages.create({
    model: 'claude-sonnet-4-20250514',
    max_tokens: 1000,
    messages: [{
      role: 'user',
      content: `Based on this analysis:
${JSON.stringify(structuredData, null, 2)}

Write a 3-paragraph executive summary for a business audience. 
Paragraph 1: Situation. Paragraph 2: Key findings. Paragraph 3: Recommended actions.`
    }]
  });
  
  return {
    structured: structuredData,
    summary: step2Response.content[0].text
  };
}

// Run the chain
runChain(yourInputData).then(result => {
  console.log('Structured data:', result.structured);
  console.log('Executive summary:', result.summary);
});
```

---

## Chapter 18: Building AI Agents

An AI agent is a system where an AI model takes actions — not just generates text. It can use tools, make decisions, loop, and handle multi-step tasks autonomously.

The prompting foundation of any AI agent is the **system prompt** — the set of instructions that defines the agent's identity, capabilities, constraints, and decision-making framework.

---

### Anatomy of an Agent System Prompt

```
## IDENTITY
You are [Agent Name], an AI agent for [Company/Purpose].

## CAPABILITIES
You have access to the following tools:
- [Tool 1]: [Description of what it does]
- [Tool 2]: [Description of what it does]
- [Tool 3]: [Description of what it does]

## YOUR TASK
[Clear description of what the agent is supposed to accomplish]

## DECISION FRAMEWORK
Follow this process for every task:
1. [Step 1 — Understand]
2. [Step 2 — Plan]
3. [Step 3 — Execute]
4. [Step 4 — Verify]
5. [Step 5 — Report]

## CONSTRAINTS
- [What you can do]
- [What you cannot do]
- [When to ask for clarification vs. proceed]
- [When to stop and report to a human]

## OUTPUT FORMAT
[How to format responses, logs, results]

## ERROR HANDLING
- If [condition]: [action]
- If you cannot complete a task: [what to say/do]
- If you are uncertain: [what to say/do]
```

---

### Example: Customer Support Triage Agent

```
## IDENTITY
You are SupportBot, a customer support triage agent for Stackflow, a project management SaaS.

## CAPABILITIES
You have access to:
- search_knowledge_base(query): Search the product documentation and FAQ
- get_customer_account(email): Retrieve customer account status, plan, and history
- create_ticket(priority, category, summary, customer_email): Create a support ticket
- send_email(to, subject, body): Send an email to the customer

## YOUR TASK
When a customer submits a support request:
1. Identify their issue type and urgency
2. Search the knowledge base for a solution
3. If solution found: Respond to customer directly with the solution
4. If no solution found: Create a ticket with appropriate priority and send a confirmation to the customer

## DECISION FRAMEWORK
For every support request:
1. CATEGORIZE: Determine issue type (billing / technical / account / feature / other)
2. ASSESS URGENCY: Is this blocking the customer's work?
3. SEARCH: Look up relevant knowledge base articles
4. DECIDE: Can you solve this? (Yes → solve / No → escalate)
5. RESPOND: Always respond to the customer — never leave without a response

## CONSTRAINTS
- Never promise specific resolution times — use "we'll prioritize this" language
- Never access or share another customer's data
- Do not make billing adjustments — create a high-priority ticket for billing team
- If a customer is abusive: Respond professionally once, then create a ticket flagged as "sensitive"
- Always confirm your action back to the customer

## ESCALATE IMMEDIATELY (create URGENT ticket):
- Service outage reports
- Data loss or corruption
- Security concerns
- Billing disputes over $200
- Requests to cancel account

## OUTPUT FORMAT
For each support request, log:
- Customer email
- Issue category
- Urgency level
- Action taken
- Ticket number (if created)
- Summary of resolution or escalation
```

---

### Example: Content Research Agent

```
## IDENTITY
You are ResearchBot, a content research agent. Your job is to gather, synthesize, and organize research for content writers.

## CAPABILITIES
- web_search(query): Search the web for current information
- extract_article(url): Extract the full text of an article
- save_note(title, content, tags): Save a research note to the knowledge base
- get_notes(tags): Retrieve saved notes by tags

## YOUR TASK
Given a content brief, conduct thorough research and return a structured research package that a writer can use to create an authoritative article.

## RESEARCH PROCESS
1. Analyze the brief — identify the key questions that need answering
2. Search for each key question (minimum 3 searches per major point)
3. Extract and save relevant passages
4. Cross-reference: Do multiple sources agree? Flag contradictions.
5. Synthesize: Organize findings by theme
6. Deliver: Return structured research package

## QUALITY STANDARDS
- Minimum 5 unique sources per research package
- Prefer authoritative sources (academic, industry reports, recognized experts)
- Flag any statistic that only appears in one source
- Note the publication date of all sources — flag anything older than 2 years
- Identify 2–3 expert voices or quotes that could be referenced

## OUTPUT FORMAT
Return a research package with:
- Key findings (organized by theme)
- Statistics and data points (with source and date)
- Expert perspectives
- Counterarguments (what critics of the main thesis say)
- Source list with credibility rating (High/Medium/Low)
- Questions still unanswered (for the writer to investigate)
```

---

### Agentic Loop Pattern

For agents that need to iterate until completion:

```
SYSTEM PROMPT:
You are an agent that works through tasks step by step. After each action, evaluate whether the task is complete. If not, determine the next step.

LOOP STRUCTURE:
1. OBSERVE: What is the current state?
2. REASON: What needs to happen next?
3. ACT: Take one action.
4. VERIFY: Did it work? What changed?
5. DECIDE: Task complete? → Report. Task incomplete? → Back to step 1.

STOPPING CONDITIONS:
- Task is fully complete
- You've taken 10 steps without completion (report status and ask for guidance)
- You encounter an error you cannot resolve (report the error)
- You need information only a human can provide (ask specifically)

NEVER: Take irreversible actions (delete, send, publish) without explicit confirmation.
```

---

## Chapter 19: Combining Prompts with APIs

The real power of prompting unlocks when you integrate AI into your workflows programmatically. This chapter covers the practical patterns for building AI-powered tools.

---

### Pattern 1: The Classification + Route Pattern

Common in customer support, content moderation, lead scoring, and triage systems.

```javascript
async function classifyAndRoute(inputText) {
  const client = new Anthropic();
  
  // Step 1: Classify
  const classificationResponse = await client.messages.create({
    model: 'claude-sonnet-4-20250514',
    max_tokens: 200,
    messages: [{
      role: 'user',
      content: `Classify the following customer message. Return ONLY a JSON object:
{
  "category": "billing|technical|account|general",
  "priority": "low|medium|high|urgent",
  "sentiment": "positive|neutral|negative|angry",
  "requires_human": true/false
}

MESSAGE: ${inputText}`
    }]
  });
  
  const classification = JSON.parse(classificationResponse.content[0].text);
  
  // Step 2: Route based on classification
  if (classification.requires_human || classification.priority === 'urgent') {
    await escalateToHuman(inputText, classification);
  } else {
    const response = await generateResponse(inputText, classification);
    await sendCustomerResponse(response);
  }
  
  return classification;
}
```

---

### Pattern 2: The Extraction + Store Pattern

For processing inbound documents, emails, or data at scale.

```javascript
async function extractAndStore(documentText, documentType) {
  const schemas = {
    invoice: `{
      "vendor": "", "invoice_number": "", "date": "YYYY-MM-DD",
      "due_date": "YYYY-MM-DD", "line_items": [], "total_usd": 0,
      "currency": "", "payment_terms": ""
    }`,
    contract: `{
      "parties": [], "effective_date": "YYYY-MM-DD",
      "expiration_date": "YYYY-MM-DD", "value": 0,
      "key_obligations": [], "termination_conditions": []
    }`
  };
  
  const client = new Anthropic();
  
  const response = await client.messages.create({
    model: 'claude-sonnet-4-20250514',
    max_tokens: 1000,
    messages: [{
      role: 'user',
      content: `Extract data from this ${documentType} and return as JSON.
      
SCHEMA:
${schemas[documentType]}

RULES:
- Return ONLY valid JSON
- Use null for missing fields
- Normalize dates to YYYY-MM-DD

DOCUMENT:
${documentText}`
    }]
  });
  
  const extracted = JSON.parse(response.content[0].text);
  
  // Validate required fields
  const required = ['vendor', 'invoice_number', 'total_usd'];
  const missing = required.filter(field => extracted[field] === null);
  
  if (missing.length > 0) {
    extracted._validation_warnings = `Missing fields: ${missing.join(', ')}`;
  }
  
  // Store to database
  await db.documents.insert({ 
    type: documentType, 
    raw: documentText, 
    extracted,
    processed_at: new Date() 
  });
  
  return extracted;
}
```

---

### Pattern 3: The Batch Generation Pattern

For generating content at scale — product descriptions, personalised emails, summaries.

```javascript
async function batchGenerate(items, promptTemplate, concurrency = 5) {
  const client = new Anthropic();
  const results = [];
  
  // Process in batches to respect rate limits
  for (let i = 0; i < items.length; i += concurrency) {
    const batch = items.slice(i, i + concurrency);
    
    const batchResults = await Promise.allSettled(
      batch.map(async (item) => {
        const prompt = promptTemplate.replace('{{ITEM}}', JSON.stringify(item));
        
        const response = await client.messages.create({
          model: 'claude-sonnet-4-20250514',
          max_tokens: 500,
          messages: [{ role: 'user', content: prompt }]
        });
        
        return {
          id: item.id,
          input: item,
          output: response.content[0].text,
          success: true
        };
      })
    );
    
    batchResults.forEach((result, idx) => {
      if (result.status === 'fulfilled') {
        results.push(result.value);
      } else {
        results.push({
          id: batch[idx].id,
          input: batch[idx],
          output: null,
          success: false,
          error: result.reason.message
        });
      }
    });
    
    // Brief delay between batches
    if (i + concurrency < items.length) {
      await new Promise(resolve => setTimeout(resolve, 1000));
    }
    
    console.log(`Processed ${Math.min(i + concurrency, items.length)}/${items.length}`);
  }
  
  return {
    total: items.length,
    successful: results.filter(r => r.success).length,
    failed: results.filter(r => !r.success).length,
    results
  };
}

// Usage:
const productTemplate = `
Generate a product description. Return only JSON:
{"short_desc": "", "long_desc": "", "bullets": []}

PRODUCT: {{ITEM}}
`;

const products = [
  { id: 1, name: "Bamboo Cutting Board", price: 65, features: ["1.5 inch thick", "antimicrobial"] },
  // ... more products
];

batchGenerate(products, productTemplate).then(console.log);
```

---

### Pattern 4: The Streaming Response Pattern

For user-facing applications where you want to show output as it generates (better UX).

```javascript
// Express.js endpoint with streaming
app.post('/generate', async (req, res) => {
  const { prompt } = req.body;
  
  res.setHeader('Content-Type', 'text/event-stream');
  res.setHeader('Cache-Control', 'no-cache');
  res.setHeader('Connection', 'keep-alive');
  
  const client = new Anthropic();
  
  const stream = client.messages.stream({
    model: 'claude-sonnet-4-20250514',
    max_tokens: 1000,
    messages: [{ role: 'user', content: prompt }]
  });
  
  for await (const event of stream) {
    if (event.type === 'content_block_delta' && event.delta.type === 'text_delta') {
      res.write(`data: ${JSON.stringify({ text: event.delta.text })}\n\n`);
    }
  }
  
  res.write('data: [DONE]\n\n');
  res.end();
});

// Frontend: Read the stream
async function streamResponse(prompt) {
  const response = await fetch('/generate', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ prompt })
  });
  
  const reader = response.body.getReader();
  const decoder = new TextDecoder();
  let output = '';
  
  while (true) {
    const { done, value } = await reader.read();
    if (done) break;
    
    const chunk = decoder.decode(value);
    const lines = chunk.split('\n');
    
    for (const line of lines) {
      if (line.startsWith('data: ') && line !== 'data: [DONE]') {
        const data = JSON.parse(line.slice(6));
        output += data.text;
        document.getElementById('output').textContent = output;
      }
    }
  }
}
```

---

### Pattern 5: The RAG (Retrieval-Augmented Generation) Pattern

For grounding AI responses in your own knowledge base, documentation, or data.

```javascript
async function ragQuery(userQuery, knowledgeBase) {
  const client = new Anthropic();
  
  // Step 1: Find relevant context from your knowledge base
  // (In production, use vector embeddings + similarity search)
  const relevantDocs = await searchKnowledgeBase(userQuery, knowledgeBase);
  
  // Step 2: Build context-enriched prompt
  const contextBlock = relevantDocs
    .map((doc, i) => `[Source ${i+1}]: ${doc.title}\n${doc.content}`)
    .join('\n\n---\n\n');
  
  // Step 3: Generate response grounded in retrieved context
  const response = await client.messages.create({
    model: 'claude-sonnet-4-20250514',
    max_tokens: 1000,
    system: `You are a helpful assistant for [Company Name]. 
    Answer questions based ONLY on the provided context.
    If the answer is not in the context, say: "I don't have information about that in our knowledge base. For the most accurate answer, please contact support@company.com"
    Never make up information. Cite the source number when possible.`,
    messages: [{
      role: 'user',
      content: `CONTEXT FROM KNOWLEDGE BASE:
${contextBlock}

---

USER QUESTION: ${userQuery}`
    }]
  });
  
  return {
    answer: response.content[0].text,
    sources: relevantDocs.map(d => d.title),
    query: userQuery
  };
}
```

---

### Building a Complete AI-Powered Tool: The Mini Content Pipeline

Here's a complete, runnable example of a content pipeline that takes a keyword and produces a complete SEO article:

```javascript
const Anthropic = require('@anthropic-ai/sdk');
const fs = require('fs');

const client = new Anthropic();

async function generateSEOArticle(keyword, targetAudience) {
  console.log(`Starting content pipeline for: "${keyword}"`);
  
  // Step 1: Research Brief
  console.log('Step 1/4: Generating research brief...');
  const briefResponse = await client.messages.create({
    model: 'claude-sonnet-4-20250514',
    max_tokens: 800,
    messages: [{
      role: 'user',
      content: `Create a content brief for a blog post targeting: "${keyword}"
      Target audience: ${targetAudience}
      
Return JSON:
{
  "primary_keyword": "",
  "secondary_keywords": [],
  "search_intent": "",
  "unique_angle": "",
  "sections": [{"title": "", "key_points": []}],
  "word_count_target": 0
}`
    }]
  });
  
  const brief = JSON.parse(briefResponse.content[0].text);
  console.log(`Brief created. ${brief.sections.length} sections planned.`);
  
  // Step 2: Write each section
  console.log('Step 2/4: Writing sections...');
  const sections = [];
  
  for (const section of brief.sections) {
    const sectionResponse = await client.messages.create({
      model: 'claude-sonnet-4-20250514',
      max_tokens: 600,
      messages: [{
        role: 'user',
        content: `Write the "${section.title}" section of a blog post about "${keyword}".
        
Target audience: ${targetAudience}
Key points to cover: ${section.key_points.join(', ')}
Length: 150-200 words
Style: Conversational, practical, no fluff

Return just the section content with the H2 header. No preamble.`
      }]
    });
    
    sections.push(sectionResponse.content[0].text);
    await new Promise(r => setTimeout(r, 500)); // Rate limit buffer
  }
  
  // Step 3: Generate meta data
  console.log('Step 3/4: Generating metadata...');
  const metaResponse = await client.messages.create({
    model: 'claude-sonnet-4-20250514',
    max_tokens: 200,
    messages: [{
      role: 'user',
      content: `For an article about "${keyword}", generate:
      
Return JSON only:
{
  "title": "[H1 title, include keyword, under 70 chars]",
  "meta_title": "[Under 60 chars, includes keyword]",
  "meta_description": "[Under 155 chars, includes keyword and benefit]",
  "slug": "[URL-friendly slug]"
}`
    }]
  });
  
  const meta = JSON.parse(metaResponse.content[0].text);
  
  // Step 4: Assemble full article
  console.log('Step 4/4: Assembling article...');
  const fullArticle = `# ${meta.title}

${sections.join('\n\n')}

---
**Meta Title:** ${meta.meta_title}
**Meta Description:** ${meta.meta_description}
**Slug:** ${meta.slug}
**Word Count:** ~${sections.join(' ').split(' ').length}
`;
  
  // Save to file
  const filename = `${meta.slug}.md`;
  fs.writeFileSync(filename, fullArticle);
  console.log(`✓ Article saved: ${filename}`);
  
  return { meta, brief, content: fullArticle, filename };
}

// Run it
generateSEOArticle(
  'best project management software for small teams',
  'small business owners and startup founders'
).then(result => {
  console.log('\nPipeline complete!');
  console.log('Title:', result.meta.title);
  console.log('Saved to:', result.filename);
});
```

---

### API Integration Best Practices

**1. Always handle errors gracefully.**
AI API calls fail. Rate limits, timeouts, and model errors happen. Every API call should be wrapped in try-catch with retry logic.

**2. Log every request and response.**
When something goes wrong in production, you need to see the exact prompt that was sent and the response that was received. Log both.

**3. Validate JSON outputs before parsing.**
When a prompt requests JSON, validate before `JSON.parse()`. Malformed JSON will crash your application.

```javascript
function safeParseJSON(text) {
  try {
    // Remove common formatting issues
    const cleaned = text
      .replace(/```json\n?/g, '')
      .replace(/```\n?/g, '')
      .trim();
    return { success: true, data: JSON.parse(cleaned) };
  } catch (e) {
    return { success: false, error: e.message, raw: text };
  }
}
```

**4. Use system prompts for persistent instructions.**
Don't repeat your role, constraints, and format instructions in every user message. Put them in the system prompt once.

**5. Monitor costs.**
Track token usage per request. Set up alerts when daily spend exceeds thresholds. The most expensive part of any AI workflow is usually a prompt that accidentally sends huge context windows.

**6. Cache aggressively.**
If the same input will produce the same output, cache the result. Product descriptions, FAQ answers, and reference content don't need to be re-generated on every request.

---

---

# CONCLUSION: THE MINDSET OF A PROMPT ENGINEER

Prompting is not a technical skill in the traditional sense. It doesn't require a computer science degree. It requires a different kind of thinking:

**Precision in communication.** The ability to specify exactly what you want, to whom, in what format, with what constraints.

**Systems thinking.** The ability to break complex tasks into logical steps, to design workflows that are repeatable and improvable.

**Iterative mindset.** The willingness to treat the first output as raw material, not a finished product.

**Domain knowledge.** The more you know about the field you're prompting in — copywriting, software development, data analysis, business strategy — the better your prompts. AI amplifies expertise; it doesn't replace it.

The people who get the most value from AI tools are not the ones who use them the most. They're the ones who use them most precisely. They've developed a library of battle-tested prompts for their specific workflows. They know which techniques produce reliable results. They treat prompt engineering as a craft worth investing in.

That's what this book is for.

---

**Start with one prompt from the template library. Use it this week. Refine it. Build on it.**

The difference between someone who dabbles with AI tools and someone who makes them a genuine competitive advantage is this: consistency and systematic improvement. One prompt, refined over time, can be worth more than a hundred prompts used once.

Build your library. Document what works. Share with your team.

The competitive moat in the AI era won't be access to the tools — it will be the depth of your prompt engineering practice.

---

*End of Book*

---

## Quick Reference: The Prompt Quality Checklist

Before submitting any important prompt, run through this checklist:

- [ ] **Role defined?** Have I told the model who it is?
- [ ] **Context provided?** Does the model have all the background it needs?
- [ ] **Task specific?** Is the request unambiguous?
- [ ] **Constraints set?** Have I specified what NOT to do?
- [ ] **Format specified?** Do I know exactly what structure I want?
- [ ] **Examples included?** (For complex or unusual outputs)
- [ ] **Length defined?** Have I specified word count or scope?
- [ ] **Audience specified?** Does the model know who the output is for?
- [ ] **No meta-commentary needed?** Did I add "Return only the output" if appropriate?
- [ ] **Testable?** Will I know immediately if this output is good or bad?

---

## Glossary

**Context window:** The amount of text a model can process in a single interaction. Larger = more information can be provided.

**Few-shot prompting:** Providing examples of the desired input-output format within the prompt.

**Hallucination:** When a model generates plausible-sounding but factually incorrect information.

**Prompt chaining:** Connecting the output of one prompt to the input of another.

**RAG (Retrieval-Augmented Generation):** A pattern that retrieves relevant documents from a database and includes them in the prompt to ground the model's responses in accurate information.

**System prompt:** A persistent instruction set given to the model before any user interaction. Sets the model's role, rules, and behavior.

**Temperature:** A parameter controlling output randomness/creativity. Low = consistent. High = varied/creative.

**Token:** The unit of text a model processes. Roughly 4 characters or 3/4 of a word in English.

**Zero-shot prompting:** Asking the model to perform a task without any examples, relying on its training.
