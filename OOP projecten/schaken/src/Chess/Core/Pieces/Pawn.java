package Chess.Core.Pieces;

import Chess.Core.*;
import Chess.Core.Usecases.ListAvailableMoves.ListAvailableBlackPawnMoves;
import Chess.Core.Usecases.ListAvailableMoves.ListAvailableWhitePawnMoves;
import Chess.Core.Usecases.LocateKing.LocateKing;

import java.util.HashSet;

// TODO
//  - De witte pawn geeft een verkeerde available move:
//  +-------+-------+-------+-------+-------+-------+-------+-------+
//  |       |       |       | *   * |       |       |       |       |
//  |       |       |       |       |       |       |       |       | 6
//  |       |       |       | *   * |       |       |       |       |
//  +-------+-------+-------+-------+-------+-------+-------+-------+
//  |       |       |       |       |       |       |       |       |
//  |       |       |       |       |  (P)  |   P   |       |       | 5 (En passant row)
//  |       |       |       |       |       |       |       |       |
//  +-------+-------+-------+-------+-------+-------+-------+-------+

public class Pawn extends Piece
{
    private final PromotionHandler promotionHandler;

    public Pawn(Color color, Board board)
    {
        super(color, board);
        this.promotionHandler = (pawn, location) -> {};
    }

    public Pawn(Color color, Board board, PromotionHandler promotionHandler)
    {
        super(color, board);
        this.promotionHandler = promotionHandler;
    }

    /**
     * Checks if the pawn reached the end of the board and if so calls the promotion-handler to handle the promotion of the pawn.
     *
     * @param state The current state of the game.
     * @param location The current location of the chess piece.
     * @param destination The destination of the chess piece.
     * @throws MoveNotPossible When the piece cannot be moved the the specified destination.
     */
    @Override
    public void move(State state, Coords location, Coords destination) throws MoveNotPossible, Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        if (isEnPassantMove(location, destination))
        {
            executeEnPassantMove(location, destination);
            setMoves(getMoves() + 1);
        }
        else
            super.move(state, location, destination);
        if (destination.y() >= 8 || destination.y() <= 1)
            promotionHandler.handlePromotion(this, destination);
    }

    @Override
    public HashSet<Coords> availableMoves(State state, Coords location) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var listMoves = switch (getColor())
        {
            case white -> new ListAvailableWhitePawnMoves();
            case black -> new ListAvailableBlackPawnMoves();
        };
        var moves = listMoves.list(getBoard(), location);
        removeMovesThatCausesChecks(state, location, moves);
        return moves;
    }

    private boolean isEnPassantMove(Coords location, Coords destination)
    {
        return !getBoard().pieceOnField(destination) && location.x() != destination.x();
    }

    private void executeEnPassantMove(Coords location, Coords destination) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var board = getBoard();

        switch (getColor())
        {
            case black -> board.removePiece(new Coords(destination.x(), destination.y() + 1));
            case white -> board.removePiece(new Coords(destination.x(), destination.y() - 1));
        }

        board.setPiece(destination, this);
        board.removePiece(location);
    }
}