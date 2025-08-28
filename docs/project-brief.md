# **Project Brief: PJL Connect**

## **Executive Summary**
PJL Connect will be a comprehensive logistics automation system designed for the PJL Logistics operations team. The primary problem it solves is the reliance on manual workflows for booking, dispatch, and communication, which are time-consuming and prone to error. By leveraging OCR technology and a Telegram-bot-based communication hub, PJL Connect's key value proposition is to dramatically increase operational efficiency, reduce manual errors, and provide real-time shipment visibility to the operations team, clients, and carrier partners.

## **Problem Statement**
The current logistics workflow at PJL Logistics is a highly manual process that relies on team members coordinating bookings, dispatches, and updates through disparate channels like email and direct messaging. Key pain points include: the manual data entry from various non-standard booking formats (PDFs, JPGs, etc.), the time-consuming process of contacting and confirming details with carriers, and the lack of a centralized, real-time view of a shipment's status for the operations team, clients, and carriers.

This manual system limits the number of shipments the team can effectively manage, creating a bottleneck for business growth. It is also susceptible to human error, which can lead to costly delays and negatively impact client satisfaction. Existing off-the-shelf logistics software often fails to accommodate PJL's unique, agile workflow, particularly the heavy reliance on Telegram for communication and the need to process customer-provided booking documents without forcing them into a new format. Solving this now is critical to enabling the business to scale efficiently and offer a superior, transparent service to clients.

## **Proposed Solution**
The proposed solution is a custom-built, web-based logistics automation platform named **PJL Connect**, with a PHP Laravel backend and MySQL database. The core concept is to create a central hub that automates the entire shipment lifecycle by deeply integrating with the Telegram messaging platform. This "Telegram-first" approach will provide dedicated bots for customers, carriers, and drivers, serving as the primary interface for communication and real-time updates.

The key differentiator from generic logistics software is PJL Connect's ability to adapt to existing workflows rather than forcing new ones. It will use Optical Character Recognition (OCR) to ingest bookings directly from customer-provided documents, eliminating the need for manual data entry or forcing clients to use a new portal. This solution will succeed by dramatically reducing friction for all stakeholders: customers continue their established processes, carriers interact via a simple messaging app they already use, and the internal Ops team is empowered with a streamlined, ticket-like system that automates repetitive tasks and provides a single source of truth for every shipment.

## **Target Users**
* **Primary User Segment: PJL Logistics Operations Team & Managers**
    * Internal employees responsible for managing the end-to-end shipment lifecycle. Their primary goal is to automate repetitive tasks, streamline communication, and manage a higher volume of shipments more efficiently.
* **Secondary User Segments: External Partners & Clients**
    * **Clients:** Businesses that need a simple, low-friction method to submit bookings and receive timely, automated status updates.
    * **Carrier Staff:** Employees of partner carrier companies who need a quick way to receive and accept jobs from their mobile devices.
    * **Drivers:** Individuals transporting goods who need a simple way to receive job details and share their location for tracking.

## **Goals & Success Metrics**
* **Business Objectives:** Increase operational capacity, reduce booking processing time by at least 75%, and improve data accuracy.
* **User Success Metrics:** A dramatic reduction in manual work for the Ops Team, near-instant confirmations for Clients, and a streamlined job-flow for Carriers.
* **Key Performance Indicators (KPIs):** Increased booking throughput per Ops member, >80% OCR accuracy rate, and a significant reduction in manual client status inquiries.

## **MVP Scope**
* **Core Features:** Telegram Integration (Customer, Carrier, Ops Bots), OCR Booking Ingestion, Automated Ops Assignment, Back Office Management System (Ticket-like UI), Carrier Dispatch Workflow, Live Driver Tracking, Admin Modules (Carrier Costs, Service Prices), Telegram-based Authentication, a minimalist Manager Dashboard, and a CSV Data Export feature.
* **Out of Scope for MVP:** Predictive Delay Analysis, Intelligent Booking Triage.
* **MVP Success Criteria:** The system can process a real booking end-to-end, the Ops team can manage their workflow entirely within the system, new users can be onboarded via the "magic link" flow, and P&L can be accurately calculated.

## **Post-MVP Vision**
* **Phase 2 Features:** A full-featured interactive Analytics Dashboard, Predictive Delay Analysis, and Intelligent Booking Triage.
* **Long-term Vision:** Evolve PJL Connect into a central business intelligence hub for PJL Logistics.
* **Expansion Opportunities:** Integration with accounting software, a full client web portal, and a carrier web portal.

## **Technical Considerations**
* **Platform:** Web-based Back Office application and Telegram bot interfaces.
* **Technology Stack:** PHP/Laravel backend, MySQL database, and a suggested Vue.js frontend.
* **Infrastructure:** Must be deployable on the company's existing shared hosting environment.
* **Architecture:** A monolithic architecture is recommended due to the scope and hosting constraints.

## **Constraints & Assumptions**
* **Constraints:** Must use PHP/Laravel, MySQL, and existing shared hosting.
* **Key Assumptions:** Reliability of the Telegram API, feasibility of OCR on client documents, user adoption of the bot interfaces, and the capability of the shared hosting to support the application.

## **Risks & Open Questions**
* **Key Risks:** Shared hosting limitations, OCR accuracy, and user adoption of the Telegram-only workflow.
* **Open Questions:** The specific technical limitations of the shared hosting and the real-world accuracy of potential OCR solutions on actual documents.

## **Appendices**
This Project Brief was created based on our detailed collaborative brainstorming session. No external research or stakeholder documents were used as inputs at this stage.

## **Next Steps**
* **Immediate Actions:**
    1.  Final approval of this Project Brief.
    2.  Conduct technical research on shared hosting capabilities and evaluate OCR solutions.
    3.  Proceed to create the detailed Product Requirements Document (PRD).
