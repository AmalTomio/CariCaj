# CariCaj Frontend AI Guidelines

> This document defines the rules for AI coding assistants (OpenCode, Codex, Copilot, Claude Code, etc.) when working on the CariCaj frontend.

---

# Project

CariCaj is a premium EV Charging Station discovery platform for Malaysia.

The frontend must feel modern, fast, minimal, and trustworthy.

---

# Tech Stack

Framework

- Next.js 15 (App Router)

Language

- JavaScript (NO TypeScript)

Styling

- Tailwind CSS v4
- shadcn/ui

State Management

- React Query
- React Hook Form

Validation

- Zod

HTTP Client

- Axios

Icons

- lucide-react ONLY

Maps

- Leaflet
- React Leaflet

Typography

- Poppins

Backend

- Laravel 10 REST API

---

# Scope

AI is ONLY responsible for frontend implementation.

DO NOT:

- implement backend logic
- create API endpoints
- generate Laravel code
- change database schema
- change project architecture

---

# UI Philosophy

Design should be inspired by:

- Google Maps
- PlugShare
- Tesla
- Apple
- Linear
- Stripe

NOT generic admin dashboards.

The UI should feel:

- premium
- clean
- modern
- lightweight
- mobile-first

---

# Design Rules

Always follow SKILLS.md.

Additionally:

- Prefer whitespace over excessive borders.
- Keep visual hierarchy simple.
- One primary accent color (Emerald).
- Neutral Slate background.
- No excessive gradients.
- No neon glow.
- Rounded corners:
  - Cards: rounded-2xl
  - Buttons: rounded-xl
- Use subtle shadows only.

---

# Icons

Always use:

lucide-react

Never use:

- emojis
- mixed icon libraries

---

# Typography

Font Family

Poppins

Hierarchy

H1
Large
Bold

H2
Medium
Semibold

Body

Readable

Never use decorative fonts.

---

# Components

Always build reusable components.

Example

Good

/components

Button

Card

SearchInput

StationCard

Bad

HomeCard

HomeButton

SearchCard2

---

# Folder Structure

Follow feature-based architecture.

Example

src/features/station

components

hooks

repository

constants

utils

views

Do not move files outside this structure.

---

# Data Rules

Never hardcode business data.

If backend data is unavailable:

Use:

- loading state
- skeleton
- empty state

Never fake charging stations.

Never fake reviews.

Never fake operators.

Temporary mock data is allowed ONLY when explicitly requested.

---

# API Rules

Do not invent API endpoints.

Only call endpoints that already exist.

If an endpoint is missing:

Build the UI only.

Leave repository methods ready for integration.

---

# Responsive Rules

Mobile First

Required breakpoints

sm

md

lg

xl

Never allow horizontal scrolling.

Never use fixed widths unless necessary.

---

# Accessibility

Always include:

- aria-label
- keyboard navigation
- focus states
- semantic HTML

---

# Performance

Use dynamic imports where appropriate.

Avoid unnecessary re-renders.

Memoize expensive components.

Do not use useEffect unnecessarily.

---

# Maps

Always use:

Leaflet

Never replace Leaflet.

Navigation will later redirect to:

Google Maps

or

Waze

Do not implement routing logic.

---

# Code Style

Prefer

Early returns

Small components

Composition

Readable variable names

Avoid

Nested ternary operators

Massive JSX files

Inline styles

Duplicate components

---

# Project Principles

Frontend must remain:

Reusable

Scalable

Maintainable

Production-ready

Every generated component should be suitable for direct production use.
